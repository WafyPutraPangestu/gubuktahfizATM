<?php

namespace App\Livewire\Admin;

use App\Models\Setoran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Dashboard — GubukTahfidzATM')]
class Dashboard extends Component
{
    public function render()
    {
        /** @var User $user */
        $user = Auth::user();
        $isAdmin = $user->isAdmin();

        $cacheKey = sprintf(
            'dashboard:%s:%s',
            $isAdmin ? 'admin' : "ustadz-{$user->id}",
            Carbon::today()->toDateString()
        );

        $stats = Cache::remember($cacheKey, now()->addMinutes(5), function () use ($isAdmin, $user) {
            return $this->computeStats($isAdmin, $user->id);
        });

        // --- TAMBAHKAN 1 BARIS INI ---
        // Mengubah array dari cache kembali menjadi objek untuk view Blade
        $stats['topSantris'] = json_decode(json_encode($stats['topSantris']));

        $stats['recentSetorans'] = $this->getRecentSetorans($isAdmin, $user->id);
        $stats['isAdmin'] = $isAdmin;

        return view('livewire.admin.dashboard', $stats);
    }
    private function computeStats(bool $isAdmin, int $userId): array
    {
        $scope = fn($query) => $isAdmin ? $query : $query->where('ustadz_id', $userId);

        $totalSantri = Siswa::query()->where('status', 'aktif')->count();

        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $sevenDaysAgo = Carbon::now()->subDays(6)->startOfDay();
        $lastWeekStart = $sevenDaysAgo->copy()->subDays(7);
        $lastWeekEnd = $sevenDaysAgo->copy()->subDay();

        // === 1 query agregat besar: hitung semua angka ringkasan sekaligus ===
        $summaryQuery = $scope(Setoran::query());
        $summary = $summaryQuery->selectRaw("
                SUM(CASE WHEN tanggal = ? THEN 1 ELSE 0 END) as setoran_hari_ini,
                SUM(CASE WHEN tanggal >= ? THEN 1 ELSE 0 END) as setoran_bulan_ini,
                SUM(CASE WHEN tanggal >= ? AND jenis = 'ziyadah' THEN 1 ELSE 0 END) as ziyadah,
                SUM(CASE WHEN tanggal >= ? AND jenis = 'murojaah' THEN 1 ELSE 0 END) as murojaah,
                SUM(CASE WHEN tanggal >= ? AND jenis = 'tadarus' THEN 1 ELSE 0 END) as tadarus,
                SUM(CASE WHEN tanggal >= ? AND tingkatan = 'iqro' THEN 1 ELSE 0 END) as t_iqro,
                SUM(CASE WHEN tanggal >= ? AND tingkatan = 'juz_ama' THEN 1 ELSE 0 END) as t_juz_ama,
                SUM(CASE WHEN tanggal >= ? AND tingkatan = 'quran' THEN 1 ELSE 0 END) as t_quran,
                SUM(CASE WHEN tanggal >= ? AND UPPER(nilai) = 'A' THEN 1 ELSE 0 END) as nilai_a,
                SUM(CASE WHEN tanggal >= ? AND UPPER(nilai) = 'B' THEN 1 ELSE 0 END) as nilai_b,
                SUM(CASE WHEN tanggal >= ? AND UPPER(nilai) = 'C' THEN 1 ELSE 0 END) as nilai_c,
                SUM(CASE WHEN tanggal >= ? AND UPPER(nilai) = 'D' THEN 1 ELSE 0 END) as nilai_d,
                SUM(CASE WHEN tanggal >= ? THEN 1 ELSE 0 END) as minggu_ini,
                SUM(CASE WHEN tanggal BETWEEN ? AND ? THEN 1 ELSE 0 END) as minggu_lalu
            ", [
            $today,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $startOfMonth,
            $sevenDaysAgo,
            $lastWeekStart,
            $lastWeekEnd,
        ])
            ->first();

        // === 1 query terpisah untuk tren 7 hari (perlu di-group per tanggal) ===
        $trendRaw = $scope(Setoran::query())
            ->where('tanggal', '>=', $sevenDaysAgo)
            ->selectRaw('tanggal, COUNT(*) as total')
            ->groupBy('tanggal')
            ->pluck('total', 'tanggal');

        $dates = collect();
        $trendCounts = collect();
        for ($i = 6; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i);
            $dates->push($day->translatedFormat('d M'));
            $trendCounts->push((int) ($trendRaw[$day->toDateString()] ?? 0));
        }

        // Growth minggu ini vs minggu lalu
        $mingguIni = (int) $summary->minggu_ini;
        $mingguLalu = (int) $summary->minggu_lalu;
        $growthPercent = match (true) {
            $mingguLalu > 0 => round((($mingguIni - $mingguLalu) / $mingguLalu) * 100),
            $mingguIni > 0 => 100,
            default => 0,
        };

        // === Santri teraktif bulan ini, ikut ter-scope kalau ustadz ===
        // === Santri teraktif bulan ini, ikut ter-scope kalau ustadz ===
        // === Santri teraktif bulan ini, ikut ter-scope kalau ustadz ===
        $topSantris = Siswa::query()->where('status', 'aktif')
            ->whereHas('setorans', function ($q) use ($isAdmin, $userId, $startOfMonth) {
                $q->where('tanggal', '>=', $startOfMonth);
                if (! $isAdmin) {
                    $q->where('ustadz_id', $userId);
                }
            })
            ->withCount(['setorans' => function ($q) use ($isAdmin, $userId, $startOfMonth) {
                $q->where('tanggal', '>=', $startOfMonth);
                if (! $isAdmin) {
                    $q->where('ustadz_id', $userId);
                }
            }])
            ->orderByDesc('setorans_count')
            ->take(4)
            ->get(['id', 'nama', 'kelas'])
            // --- UBAH MENJADI ARRAY MURNI DI SINI ---
            ->map(function ($santri) {
                return [
                    'id'             => $santri->id,
                    'nama'           => $santri->nama,
                    'kelas'          => $santri->kelas,
                    'setorans_count' => $santri->setorans_count,
                ];
            })
            ->toArray(); // Wajib toArray()

        return [
            'totalSantri'     => $totalSantri,
            'setoranHariIni'  => (int) $summary->setoran_hari_ini,
            'setoranBulanIni' => (int) $summary->setoran_bulan_ini,
            'growthPercent'   => $growthPercent,

            'topSantris' => $topSantris,

            'chartTrenDates' => $dates->toJson(),
            'chartTrenData'  => $trendCounts->toJson(),
            'chartJenisData' => collect([
                (int) $summary->ziyadah,
                (int) $summary->murojaah,
                (int) $summary->tadarus,
            ])->toJson(),

            'tingkatanBreakdown' => [
                'iqro'    => (int) $summary->t_iqro,
                'juz_ama' => (int) $summary->t_juz_ama,
                'quran'   => (int) $summary->t_quran,
            ],

            'nilaiBreakdown' => [
                'A' => (int) $summary->nilai_a,
                'B' => (int) $summary->nilai_b,
                'C' => (int) $summary->nilai_c,
                'D' => (int) $summary->nilai_d,
            ],
        ];
    }

    private function getRecentSetorans(bool $isAdmin, int $userId)
    {
        return Setoran::query()
            ->select([
                'id',
                'siswa_id',
                'ustadz_id',
                'tanggal',
                'jam',
                'jenis',
                'tingkatan',
                'nilai',
                'iqro_awal',
                'halaman_iqro_awal',
                'surah_awal',
                'ayat_awal',
                'juz',
                'halaman_awal',
            ])
            ->when(! $isAdmin, fn($q) => $q->where('ustadz_id', $userId))
            ->with(['siswa:id,nama', 'ustadz:id,name'])
            ->orderByDesc('tanggal')
            ->orderByDesc('jam')
            ->take(5)
            ->get();
    }
}
