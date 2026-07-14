<?php

namespace App\Livewire;

use App\Models\Setoran;
use App\Models\Siswa;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app', ['bareMain' => true])]
class Home extends Component
{
    #[Validate('required', message: 'Kode akses tidak boleh kosong.')]
    #[Validate('exists:siswas,kode_akses', message: 'Kode akses tidak ditemukan! Periksa kembali kode dari sekolah.')]
    public string $kode_akses = '';

    public function cari()
    {
        $this->validate();

        // Jika kode valid, arahkan ke halaman detail (Dashboard Wali Murid)
        return $this->redirect(route('hafalan.show', $this->kode_akses), navigate: true);
    }

    public function render()
    {
        return view('livewire.home', [
            'totalSantriAktif' => Siswa::query()->where('status', 'aktif')->count(),
            'totalUstadz'      => User::query()->where('role', 'ustadz')->count(),
            'totalSetoran'     => Setoran::count('*'),
        ]);
    }
}
