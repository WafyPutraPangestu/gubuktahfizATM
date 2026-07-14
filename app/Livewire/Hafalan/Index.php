<?php

namespace App\Livewire\Hafalan;

use App\Models\Siswa;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Cek Hafalan Santri — GubukTahfidzATM')]
class Index extends Component
{
    public string $kode_akses = '';

    /**
     * Rules didefinisikan di method (bukan attribute) supaya lebih mudah
     * di-debug dan tidak ambigu kalau ada lebih dari satu rule per field.
     */
    protected function rules(): array
    {
        return [
            'kode_akses' => ['required', 'string', 'exists:siswas,kode_akses'],
        ];
    }

    protected function messages(): array
    {
        return [
            'kode_akses.required' => 'Kode akses tidak boleh kosong.',
            'kode_akses.exists'   => 'Kode akses tidak ditemukan! Periksa kembali kode dari sekolah.',
        ];
    }

    public function cari(): void
    {
        // Debug sementara — cek storage/logs/laravel.log setiap kali submit.
        // Kalau baris ini TIDAK muncul di log setelah klik "Cek progress",
        // berarti request tidak pernah sampai ke server (masalah di sisi JS/Livewire).
        logger('HAFALAN cari() dipanggil', ['input' => $this->kode_akses]);

        $this->kode_akses = strtoupper(trim($this->kode_akses));

        $validated = $this->validate();

        // Ambil siswa langsung di sini (opsional, tapi lebih aman daripada
        // asumsi kode_akses pasti valid setelah redirect).
        $siswa = Siswa::where('kode_akses', $validated['kode_akses'])->first();

        if (! $siswa) {
            $this->addError('kode_akses', 'Kode akses tidak ditemukan! Periksa kembali kode dari sekolah.');
            return;
        }

        $this->redirect(route('hafalan.show', $siswa->kode_akses), navigate: true);
    }

    public function render()
    {
        return view('livewire.hafalan.index');
    }
}
