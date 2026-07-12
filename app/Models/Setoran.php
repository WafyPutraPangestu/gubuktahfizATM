<?php

namespace App\Models;

use Database\Factories\SetoranFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'siswa_id',
    'ustadz_id',
    'tanggal',
    'jam',
    'jenis',
    'tingkatan',
    // iqro
    'iqro_awal',
    'halaman_iqro_awal',
    'ayat_iqro_awal',
    'iqro_akhir',
    'halaman_iqro_akhir',
    'ayat_iqro_akhir',
    // juz ama
    'surah_awal',
    'ayat_awal',
    'surah_akhir',
    'ayat_akhir',
    // quran
    'juz',
    'halaman_awal',
    'halaman_akhir',
    // umum
    'jumlah_halaman',
    'nilai',
    'catatan',
])]
class Setoran extends Model
{
    /** @use HasFactory<SetoranFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'tanggal'            => 'date',
            'ayat_awal'          => 'integer',
            'ayat_akhir'         => 'integer',
            'iqro_awal'          => 'integer',
            'iqro_akhir'         => 'integer',
            'halaman_iqro_awal'  => 'integer',
            'halaman_iqro_akhir' => 'integer',
            'ayat_iqro_awal'     => 'integer',
            'ayat_iqro_akhir'    => 'integer',
            'halaman_awal'       => 'integer',
            'halaman_akhir'      => 'integer',
            'jumlah_halaman'     => 'decimal:2',
        ];
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function ustadz(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ustadz_id');
    }
}
