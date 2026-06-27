<div style="background: var(--color-neutral-100); min-height: 100vh; padding-bottom: 3rem;">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <div
        style="background: white; border-bottom: 1px solid var(--color-neutral-200); padding: 1rem 1.5rem; display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 50;">
        <div style="font-weight: 800; font-size: 1.25rem; color: var(--color-neutral-900);">
            📖 HAFIZ<span style="color: var(--color-primary-600);">APP</span>
        </div>
        <a href="{{ route('hafalan.index') }}" wire:navigate class="btn btn-secondary btn-sm">GANTI SANTRI</a>
    </div>

    <div class="container-app" style="margin-top: 2rem;">

        <div class="card" style="margin-bottom: 2rem; border-top: 6px solid var(--color-primary-400);">
            <div class="card-body" style="display: flex; gap: 1.5rem; align-items: center; flex-wrap: wrap;">
                <div class="avatar avatar-2xl" style="width: 100px; height: 100px; font-size: 2.5rem;">
                    @if ($siswa->foto)
                        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto">
                    @else
                        {{ substr($siswa->nama, 0, 1) }}
                    @endif
                </div>
                <div style="flex: 1; min-width: 250px;">
                    <div style="display: flex; gap: 0.5rem; align-items: center; margin-bottom: 0.25rem;">
                        <h1 class="h2" style="margin: 0; text-transform: uppercase;">{{ $siswa->nama }}</h1>
                        @if ($siswa->status === 'aktif')
                            <span class="badge badge-success">AKTIF</span>
                        @endif
                    </div>
                    <p class="text-lead" style="margin: 0;">Kelas: <strong>{{ $siswa->kelas }}</strong> &bull; NIS:
                        {{ $siswa->nis }}</p>
                </div>
                <div style="text-align: right;">
                    <p class="text-label" style="margin-bottom: 0.25rem;">Setoran Terakhir</p>
                    <h3 class="h4" style="margin: 0; color: var(--color-primary-700);">
                        {{ $setoranTerakhir ? \Carbon\Carbon::parse($setoranTerakhir->tanggal)->diffForHumans() : 'Belum Ada' }}
                    </h3>
                </div>
            </div>
        </div>

        <div
            style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem; @media(min-width: 1024px){ grid-template-columns: 2fr 1fr; }">

            <div class="card">
                <div class="card-header">
                    <h3 class="h5">Progres Hafalan Al-Qur'an (Ziyadah)</h3>
                </div>
                <div class="card-body">
                    <div style="display: flex; justify-content: space-between; align-items: end; margin-bottom: 1rem;">
                        <div>
                            <h2 class="text-display" style="color: var(--color-neutral-900);">
                                {{ number_format($persentaseQuran, 1, ',', '.') }}%
                            </h2>
                            <p class="text-caption" style="font-size: 0.875rem;">Selesai dari total 604 Halaman Mushaf
                            </p>
                        </div>
                        <div style="text-align: right;">
                            <h3 class="h3" style="color: var(--color-primary-600);">{{ $totalHalamanZiyadah }} <span
                                    style="font-size: 1rem; color: var(--color-neutral-500);">Hal</span></h3>
                        </div>
                    </div>

                    <div class="progress-track progress-track-lg">
                        <div class="progress-fill" style="width: {{ $persentaseQuran }}%;"></div>
                    </div>

                    <div class="section-divider"></div>

                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <p class="text-label">Total Sesi Setoran</p>
                            <p style="font-weight: 800; font-size: 1.25rem;">{{ $setorans->count() }} <span
                                    class="text-caption">Kali</span></p>
                        </div>
                        <div style="text-align: right;">
                            <p class="text-label">Total Murojaah (Ulang)</p>
                            <p style="font-weight: 800; font-size: 1.25rem;">{{ $totalMurojaah }} <span
                                    class="text-caption">Kali</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" x-data="{
                init() {
                    let options = {
                        series: {{ $grafikNilai }},
                        labels: ['A (Sangat Lancar)', 'B (Lancar)', 'C (Cukup)', 'D (Mengulang)'],
                        chart: { type: 'donut', height: 280, fontFamily: 'var(--font-sans)' },
                        colors: ['#a3e635', '#60a5fa', '#fbbf24', '#f43f5e'],
                        plotOptions: {
                            pie: { donut: { size: '65%', labels: { show: true, name: { show: false }, value: { show: true, fontSize: '1.5rem', fontWeight: 800, color: '#09090b' }, total: { show: true, showAlways: true, label: 'Kualitas', fontSize: '0.75rem' } } } }
                        },
                        dataLabels: { enabled: false },
                        stroke: { show: false },
                        legend: { position: 'bottom', fontWeight: 700 }
                    };
                    new ApexCharts(this.$refs.kualitasChart, options).render();
                }
            }">
                <div class="card-header">
                    <h3 class="h5">Kualitas Kelancaran</h3>
                </div>
                <div class="card-body"
                    style="display: flex; justify-content: center; align-items: center; padding-top: 1.5rem;">
                    <div x-ref="kualitasChart" style="width: 100%;"></div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h5">Buku Prestasi & Catatan Ustadz</h3>
            </div>

            <div class="table-wrapper" style="border-radius: 0; border: none; box-shadow: none;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Waktu & Ustadz</th>
                            <th>Jenis Setoran</th>
                            <th>Surah & Ayat</th>
                            <th>Nilai</th>
                            <th>Catatan & Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($setorans as $setoran)
                            <tr>
                                <td>
                                    <strong
                                        style="font-size: 0.9375rem;">{{ \Carbon\Carbon::parse($setoran->tanggal)->format('d M Y') }}</strong><br>
                                    <span
                                        class="text-caption">{{ \Carbon\Carbon::parse($setoran->jam)->format('H:i') }}
                                        WIB</span><br>
                                    <span
                                        style="font-size: 0.75rem; color: var(--color-primary-700); font-weight: 700;">Ustadz:
                                        {{ $setoran->ustadz->name }}</span>
                                </td>
                                <td>
                                    <span
                                        class="badge {{ $setoran->jenis === 'ziyadah' ? 'pill-ziyadah' : 'pill-murojaah' }}">
                                        {{ $setoran->jenis }}
                                    </span><br>
                                    <span class="text-caption">{{ $setoran->jumlah_halaman }} Halaman</span>
                                </td>
                                <td style="min-width: 180px;">
                                    @if ($setoran->surah_awal === $setoran->surah_akhir)
                                        <!-- JIKA DI SURAH YANG SAMA -->
                                        <div
                                            style="display: flex; flex-direction: column; align-items: flex-start; gap: 0.375rem;">
                                            <span
                                                style="font-weight: 800; font-size: 1.0625rem; color: var(--color-neutral-900); line-height: 1.2;">
                                                {{ $setoran->surah_awal }}
                                            </span>
                                            <span class="info-chip"
                                                style="font-size: 0.75rem; padding: 0.125rem 0.5rem; border-color: var(--color-primary-200); background: var(--color-primary-50); color: var(--color-primary-700);">
                                                Ayat {{ $setoran->ayat_awal }} &mdash; {{ $setoran->ayat_akhir }}
                                            </span>
                                        </div>
                                    @else
                                        <!-- JIKA LINTAS SURAH (BEDA SURAH) -->
                                        <div style="display: flex; flex-direction: column; gap: 0.375rem;">
                                            <div style="line-height: 1.2;">
                                                <span
                                                    style="font-weight: 700; font-size: 0.9375rem; color: var(--color-neutral-900);">{{ $setoran->surah_awal }}</span><br>
                                                <span
                                                    style="font-size: 0.75rem; color: var(--color-neutral-500); font-weight: 600;">Ayat
                                                    {{ $setoran->ayat_awal }}</span>
                                            </div>

                                            <!-- Icon Panah (Indikator Lanjut) -->
                                            <div
                                                style="color: var(--color-primary-600); font-size: 0.875rem; display: flex; align-items: center; gap: 0.25rem;">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <line x1="12" y1="5" x2="12" y2="19">
                                                    </line>
                                                    <polyline points="19 12 12 19 5 12"></polyline>
                                                </svg>
                                            </div>

                                            <div style="line-height: 1.2;">
                                                <span
                                                    style="font-weight: 700; font-size: 0.9375rem; color: var(--color-neutral-900);">{{ $setoran->surah_akhir }}</span><br>
                                                <span
                                                    style="font-size: 0.75rem; color: var(--color-neutral-500); font-weight: 600;">Ayat
                                                    {{ $setoran->ayat_akhir }}</span>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="grade-badge grade-{{ strtolower($setoran->nilai) }}"
                                        style="width: 48px; height: 48px; font-size: 1.5rem;">
                                        {{ $setoran->nilai }}
                                    </span>
                                </td>
                                <td style="max-width: 250px;">
                                    @if ($setoran->catatan)
                                        <div
                                            style="background: var(--color-warning-50); border-left: 3px solid var(--color-warning-500); padding: 0.75rem; border-radius: 0 var(--radius-md) var(--radius-md) 0; font-size: 0.8125rem; color: var(--color-neutral-800); font-style: italic;">
                                            "{{ $setoran->catatan }}"
                                        </div>
                                    @else
                                        <span style="color: var(--color-neutral-400); font-size: 0.8125rem;">Tidak ada
                                            catatan.</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <div class="empty-state-title">Belum Ada Setoran</div>
                                        <p class="empty-state-desc">Ananda belum memiliki riwayat setoran hafalan saat
                                            ini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
