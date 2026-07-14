<?php

namespace Database\Seeders;

use App\Models\Setoran;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /** Daftar surah Juz Amma, urutan umum hafalan (dari belakang mushaf/An-Nas ke depan) + jumlah ayat. */
    private array $surahJuzAmma = [
        ['nama' => 'An-Nas', 'ayat' => 6],
        ['nama' => 'Al-Falaq', 'ayat' => 5],
        ['nama' => 'Al-Ikhlas', 'ayat' => 4],
        ['nama' => 'Al-Masad', 'ayat' => 5],
        ['nama' => 'An-Nasr', 'ayat' => 3],
        ['nama' => 'Al-Kafirun', 'ayat' => 6],
        ['nama' => 'Al-Kautsar', 'ayat' => 3],
        ['nama' => 'Al-Ma\'un', 'ayat' => 7],
        ['nama' => 'Quraisy', 'ayat' => 4],
        ['nama' => 'Al-Fil', 'ayat' => 5],
        ['nama' => 'Al-Humazah', 'ayat' => 9],
        ['nama' => 'Al-\'Asr', 'ayat' => 3],
        ['nama' => 'At-Takatsur', 'ayat' => 8],
        ['nama' => 'Al-Qari\'ah', 'ayat' => 11],
        ['nama' => 'Al-\'Adiyat', 'ayat' => 11],
        ['nama' => 'Az-Zalzalah', 'ayat' => 8],
        ['nama' => 'Al-Bayyinah', 'ayat' => 8],
        ['nama' => 'Al-Qadr', 'ayat' => 5],
        ['nama' => 'Al-\'Alaq', 'ayat' => 19],
        ['nama' => 'At-Tin', 'ayat' => 8],
        ['nama' => 'Al-Insyirah', 'ayat' => 8],
        ['nama' => 'Ad-Dhuha', 'ayat' => 11],
        ['nama' => 'Al-Lail', 'ayat' => 21],
        ['nama' => 'Asy-Syams', 'ayat' => 15],
        ['nama' => 'Al-Balad', 'ayat' => 20],
    ];

    /** Nilai umum yang mungkin muncul, di-weight supaya A/B lebih sering (realistis). */
    private array $daftarNilai = ['A', 'A', 'A', 'B', 'B', 'B', 'C', 'C', 'D'];

    /** Beberapa contoh catatan ustadz (nullable — kadang kosong). */
    private array $daftarCatatan = [
        'Bacaan lancar, tajwid sudah baik.',
        'Perlu perbaikan makhraj huruf ain dan kha.',
        'Hafalan kuat, pertahankan muroja\'ah rutin.',
        'Masih terbata-bata di beberapa ayat, perlu diulang.',
        'Alhamdulillah lancar, semangat terus!',
        'Panjang pendek bacaan perlu lebih diperhatikan.',
        null,
        null,
        null,
    ];

    public function run(): void
    {
        // ===================== ADMIN =====================
        User::create([
            'role' => 'admin',
            'name' => 'Admin Ustadz',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // ===================== USTADZ (10 akun) =====================
        $namaUstadz = [
            'Ustadz Ahmad Fauzi',
            'Ustadz Muhammad Ridwan',
            'Ustadz Abdul Karim',
            'Ustadz Hasan Basri',
            'Ustadz Ibrahim Hakim',
            'Ustadz Yusuf Mansur',
            'Ustadz Umar Faruq',
            'Ustadz Bilal Ramadhan',
            'Ustadz Zaid Alfarizi',
            'Ustadz Hamzah Syakir',
        ];

        $ustadzList = collect();
        foreach ($namaUstadz as $i => $nama) {
            $nomor = $i + 1;
            $ustadzList->push(User::create([
                'role' => 'ustadz',
                'name' => $nama,
                'email' => "ustadz{$nomor}@gmail.com",
                'password' => Hash::make('password'),
            ]));
        }

        // ===================== SISWA (10 akun) =====================
        $namaSiswa = [
            'Muhammad Rizky Ramadhan',
            'Ahmad Zaki Alfarisi',
            'Fatimah Az-Zahra',
            'Khadijah Nur Aisyah',
            'Abdullah Rasyid',
            'Aisyah Putri Ramadhani',
            'Umar Abdurrahman',
            'Hafshah Salsabila',
            'Yusuf Ibrahim Maulana',
            'Zahra Nur Kamila',
        ];

        $kelasList = ['1A', '1B', '2A', '2B', '3A', '3B', '4A', '4B', '5A', '5B'];

        // Target level tiap siswa: campuran biar variatif — 3 di Iqro, 3 di Juz Amma, 4 di Qur'an
        $targetLevel = [
            'iqro',
            'iqro',
            'iqro',
            'juz_ama',
            'juz_ama',
            'juz_ama',
            'quran',
            'quran',
            'quran',
            'quran',
        ];

        foreach ($namaSiswa as $i => $nama) {
            $siswa = Siswa::create([
                'nama' => $nama,
                'nis' => '2024' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'kelas' => $kelasList[$i],
                'kode_akses' => Str::upper(Str::random(3)) . '-' . Str::upper(Str::random(3)),
                'tanggal_masuk' => Carbon::now()->subMonths(rand(3, 18))->subDays(rand(0, 28)),
                'status' => 'aktif',
            ]);

            $ustadzAsuh = $ustadzList->random();

            match ($targetLevel[$i]) {
                'iqro' => $this->seedIqroProgress($siswa, $ustadzList),
                'juz_ama' => $this->seedJuzAmmaProgress($siswa, $ustadzList),
                'quran' => $this->seedQuranProgress($siswa, $ustadzList),
            };
        }
    }

    /**
     * Generate riwayat setoran untuk santri level Iqro.
     * Siswa maju dari jilid 1 sampai jilid acak (2-6), tiap jilid beberapa sesi ziyadah + 1 murojaah.
     */
    private function seedIqroProgress(Siswa $siswa, $ustadzList): void
    {
        $jilidTertinggi = rand(2, 6);
        $tanggal = Carbon::now()->subMonths(rand(2, 6));

        for ($jilid = 1; $jilid <= $jilidTertinggi; $jilid++) {
            $halamanSekarang = 1;
            $jumlahSesi = rand(3, 6);

            for ($sesi = 0; $sesi < $jumlahSesi; $sesi++) {
                $halamanAwal = $halamanSekarang;
                $tambahHalaman = rand(1, 3);
                $halamanAkhir = $halamanAwal + $tambahHalaman;
                $halamanSekarang = $halamanAkhir + 1;

                $tanggal = $tanggal->copy()->addDays(rand(1, 4));

                Setoran::create([
                    'siswa_id' => $siswa->id,
                    'ustadz_id' => $ustadzList->random()->id,
                    'tanggal' => $tanggal,
                    'jam' => $this->randomJam(),
                    'jenis' => 'ziyadah',
                    'tingkatan' => 'iqro',
                    'iqro_awal' => $jilid,
                    'halaman_iqro_awal' => $halamanAwal,
                    'ayat_iqro_awal' => rand(1, 5),
                    'iqro_akhir' => $jilid,
                    'halaman_iqro_akhir' => $halamanAkhir,
                    'ayat_iqro_akhir' => rand(1, 10),
                    'jumlah_halaman' => $tambahHalaman,
                    'nilai' => $this->randomNilai(),
                    'catatan' => $this->randomCatatan(),
                ]);
            }

            // 1 sesi murojaah mengulang jilid yang baru selesai
            $tanggal = $tanggal->copy()->addDays(rand(2, 5));
            Setoran::create([
                'siswa_id' => $siswa->id,
                'ustadz_id' => $ustadzList->random()->id,
                'tanggal' => $tanggal,
                'jam' => $this->randomJam(),
                'jenis' => 'murojaah',
                'tingkatan' => 'iqro',
                'iqro_awal' => $jilid,
                'halaman_iqro_awal' => 1,
                'ayat_iqro_awal' => 1,
                'iqro_akhir' => $jilid,
                'halaman_iqro_akhir' => $halamanSekarang - 1,
                'ayat_iqro_akhir' => rand(1, 10),
                'jumlah_halaman' => $halamanSekarang - 1,
                'nilai' => $this->randomNilai(),
                'catatan' => $this->randomCatatan(),
            ]);
        }
    }

    /**
     * Generate riwayat setoran untuk santri level Juz Amma.
     * Maju surah demi surah sesuai urutan hafalan umum, selingi murojaah & tadarus.
     */
    private function seedJuzAmmaProgress(Siswa $siswa, $ustadzList): void
    {
        $jumlahSurahDihafal = rand(6, 15);
        $tanggal = Carbon::now()->subMonths(rand(2, 8));

        for ($i = 0; $i < $jumlahSurahDihafal; $i++) {
            $surah = $this->surahJuzAmma[$i];
            $tanggal = $tanggal->copy()->addDays(rand(2, 6));

            // Ziyadah: hafal surah baru, penuh 1 surah
            Setoran::create([
                'siswa_id' => $siswa->id,
                'ustadz_id' => $ustadzList->random()->id,
                'tanggal' => $tanggal,
                'jam' => $this->randomJam(),
                'jenis' => 'ziyadah',
                'tingkatan' => 'juz_ama',
                'surah_awal' => $surah['nama'],
                'ayat_awal' => 1,
                'surah_akhir' => $surah['nama'],
                'ayat_akhir' => $surah['ayat'],
                'jumlah_halaman' => round($surah['ayat'] / 10, 2), // estimasi kasar
                'nilai' => $this->randomNilai(),
                'catatan' => $this->randomCatatan(),
            ]);

            // Sesekali selingi murojaah surah sebelumnya
            if ($i > 0 && rand(0, 1) === 1) {
                $surahUlang = $this->surahJuzAmma[rand(0, $i - 1)];
                $tanggal = $tanggal->copy()->addDays(rand(1, 3));

                Setoran::create([
                    'siswa_id' => $siswa->id,
                    'ustadz_id' => $ustadzList->random()->id,
                    'tanggal' => $tanggal,
                    'jam' => $this->randomJam(),
                    'jenis' => 'murojaah',
                    'tingkatan' => 'juz_ama',
                    'surah_awal' => $surahUlang['nama'],
                    'ayat_awal' => 1,
                    'surah_akhir' => $surahUlang['nama'],
                    'ayat_akhir' => $surahUlang['ayat'],
                    'jumlah_halaman' => round($surahUlang['ayat'] / 10, 2),
                    'nilai' => $this->randomNilai(),
                    'catatan' => $this->randomCatatan(),
                ]);
            }

            // Sesekali selingi tadarus bebas
            if (rand(0, 2) === 0) {
                $surahTadarus = $this->surahJuzAmma[rand(0, $i)];
                $tanggal = $tanggal->copy()->addDays(rand(1, 3));

                Setoran::create([
                    'siswa_id' => $siswa->id,
                    'ustadz_id' => $ustadzList->random()->id,
                    'tanggal' => $tanggal,
                    'jam' => $this->randomJam(),
                    'jenis' => 'tadarus',
                    'tingkatan' => 'juz_ama',
                    'surah_awal' => $surahTadarus['nama'],
                    'ayat_awal' => 1,
                    'surah_akhir' => $surahTadarus['nama'],
                    'ayat_akhir' => $surahTadarus['ayat'],
                    'jumlah_halaman' => round($surahTadarus['ayat'] / 10, 2),
                    'nilai' => $this->randomNilai(),
                    'catatan' => $this->randomCatatan(),
                ]);
            }
        }
    }

    /**
     * Generate riwayat setoran untuk santri level Qur'an (per juz per halaman).
     * Juz 1..N-1 dianggap tuntas (20 halaman), juz ke-N berjalan sebagian.
     */
    private function seedQuranProgress(Siswa $siswa, $ustadzList): void
    {
        $juzTertinggi = rand(1, 10);
        $tanggal = Carbon::now()->subMonths(rand(3, 12));

        for ($juz = 1; $juz <= $juzTertinggi; $juz++) {
            $halamanTarget = ($juz === $juzTertinggi) ? rand(4, 18) : 20;
            $halamanSekarang = 1;
            $jumlahSesi = max(2, (int) ceil($halamanTarget / 4));

            for ($sesi = 0; $sesi < $jumlahSesi && $halamanSekarang <= $halamanTarget; $sesi++) {
                $halamanAwal = $halamanSekarang;
                $tambahHalaman = min(rand(2, 4), $halamanTarget - $halamanAwal + 1);
                $halamanAkhir = $halamanAwal + $tambahHalaman - 1;
                $halamanSekarang = $halamanAkhir + 1;

                $tanggal = $tanggal->copy()->addDays(rand(1, 4));

                Setoran::create([
                    'siswa_id' => $siswa->id,
                    'ustadz_id' => $ustadzList->random()->id,
                    'tanggal' => $tanggal,
                    'jam' => $this->randomJam(),
                    'jenis' => 'ziyadah',
                    'tingkatan' => 'quran',
                    'juz' => "Juz {$juz}",
                    'halaman_awal' => $halamanAwal,
                    'halaman_akhir' => $halamanAkhir,
                    'jumlah_halaman' => $tambahHalaman,
                    'nilai' => $this->randomNilai(),
                    'catatan' => $this->randomCatatan(),
                ]);
            }

            // Murojaah setelah juz sebelumnya selesai
            if ($juz < $juzTertinggi || $halamanSekarang > $halamanTarget) {
                $tanggal = $tanggal->copy()->addDays(rand(2, 5));

                Setoran::create([
                    'siswa_id' => $siswa->id,
                    'ustadz_id' => $ustadzList->random()->id,
                    'tanggal' => $tanggal,
                    'jam' => $this->randomJam(),
                    'jenis' => 'murojaah',
                    'tingkatan' => 'quran',
                    'juz' => "Juz {$juz}",
                    'halaman_awal' => 1,
                    'halaman_akhir' => $halamanTarget,
                    'jumlah_halaman' => $halamanTarget,
                    'nilai' => $this->randomNilai(),
                    'catatan' => $this->randomCatatan(),
                ]);
            }

            // Sesekali tadarus bebas dari juz yang sudah dilalui
            if (rand(0, 2) === 0) {
                $juzTadarus = rand(1, $juz);
                $tanggal = $tanggal->copy()->addDays(rand(1, 3));

                Setoran::create([
                    'siswa_id' => $siswa->id,
                    'ustadz_id' => $ustadzList->random()->id,
                    'tanggal' => $tanggal,
                    'jam' => $this->randomJam(),
                    'jenis' => 'tadarus',
                    'tingkatan' => 'quran',
                    'juz' => "Juz {$juzTadarus}",
                    'halaman_awal' => 1,
                    'halaman_akhir' => rand(5, 20),
                    'jumlah_halaman' => rand(2, 10),
                    'nilai' => $this->randomNilai(),
                    'catatan' => $this->randomCatatan(),
                ]);
            }
        }
    }

    private function randomJam(): string
    {
        return sprintf('%02d:%02d:00', rand(6, 17), rand(0, 59));
    }

    private function randomNilai(): string
    {
        return $this->daftarNilai[array_rand($this->daftarNilai)];
    }

    private function randomCatatan(): ?string
    {
        return $this->daftarCatatan[array_rand($this->daftarCatatan)];
    }
}
