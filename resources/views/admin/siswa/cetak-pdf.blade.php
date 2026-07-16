<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Hafalan - {{ $siswa->nama }}</title>
    <style>
        @page {
            margin: 25px 30px;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #000000;
            line-height: 1.5;
        }

        /* ===== HEADER ===== */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #000000;
            padding-bottom: 10px;
            margin-bottom: 16px;
        }

        .header-table td {
            vertical-align: middle;
        }

        .header-logo {
            width: 55px;
        }

        .header-logo img {
            width: 45px;
            height: 45px;
        }

        .header-title h1 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .header-title p {
            margin: 2px 0 0;
            font-size: 10px;
            color: #444444;
        }

        .header-tanggal {
            text-align: right;
            font-size: 9px;
            color: #444444;
        }

        /* ===== IDENTITAS SANTRI ===== */
        table.identitas {
            width: 100%;
            margin-bottom: 16px;
        }

        table.identitas td {
            padding: 3px 8px 3px 0;
            font-size: 11px;
            vertical-align: top;
        }

        table.identitas .label {
            width: 110px;
            font-weight: bold;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-size: 12px;
            font-weight: bold;
            margin: 16px 0 6px;
            padding-bottom: 3px;
            border-bottom: 1px solid #000000;
        }

        /* ===== REKAP ===== */
        table.rekap {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }

        table.rekap th {
            background: #e5e5e5;
            border: 1px solid #000000;
            padding: 6px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
        }

        table.rekap td {
            border: 1px solid #000000;
            padding: 6px;
            text-align: center;
            font-size: 10px;
        }

        table.rekap .rekap-label {
            text-align: left;
            font-weight: bold;
        }

        /* ===== DETAIL RIWAYAT ===== */
        .jenis-heading {
            font-size: 11px;
            font-weight: bold;
            margin: 14px 0 5px;
            text-decoration: underline;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }

        table.data th {
            background: #e5e5e5;
            border: 1px solid #000000;
            padding: 5px 4px;
            font-size: 9px;
            font-weight: bold;
            text-align: left;
        }

        table.data td {
            border: 1px solid #000000;
            padding: 5px 4px;
            font-size: 9px;
        }

        /* ===== TANDA TANGAN ===== */
        .ttd {
            margin-top: 45px;
            width: 100%;
        }

        .ttd td {
            width: 50%;
            text-align: center;
            font-size: 10px;
        }

        .ttd .garis {
            display: block;
            margin-top: 55px;
            padding-top: 3px;
            border-top: 1px solid #000000;
            font-weight: bold;
        }

        /* ===== FOOTER NOTE ===== */
        .footer-note {
            margin-top: 20px;
            padding-top: 6px;
            border-top: 1px solid #cccccc;
            font-size: 8px;
            color: #666666;
            text-align: center;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <table class="header-table">
        <tr>
            <td class="header-logo">
                @if (file_exists(public_path('images/LOGO-ATM-pdf.png')))
                    <img src="{{ public_path('images/LOGO-ATM-pdf.png') }}" alt="Logo">
                @endif
            </td>
            <td class="header-title">
                <h1>Laporan Hafalan Santri</h1>
                <p>Pondok Pesantren Al Ittihadul Mubarok</p>
            </td>
            <td class="header-tanggal">
                Dicetak: {{ now()->translatedFormat('d F Y') }}<br>
                Pukul {{ now()->format('H:i') }} WIB
            </td>
        </tr>
    </table>

    {{-- IDENTITAS --}}
    <table class="identitas">
        <tr>
            <td class="label">Nama Santri</td>
            <td>: {{ $siswa->nama }}</td>
            <td class="label">NIS</td>
            <td>: {{ $siswa->nis }}</td>
        </tr>
        <tr>
            <td class="label">Kelas</td>
            <td>: {{ $siswa->kelas }}</td>
            <td class="label">Status</td>
            <td>: {{ ucfirst($siswa->status) }}</td>
        </tr>
    </table>

    {{-- REKAP --}}
    <p class="section-title">Ringkasan Rekapitulasi</p>
    <table class="rekap">
        <tr>
            <th style="text-align:left;">Jenis Setoran</th>
            <th>Jumlah Setoran</th>
            <th>Total Halaman</th>
        </tr>
        @foreach (['ziyadah' => 'Ziyadah', 'murojaah' => 'Murojaah', 'tadarus' => 'Tadarus'] as $key => $label)
            <tr>
                <td class="rekap-label">{{ $label }}</td>
                <td>{{ $rekap[$key]['jumlah_setoran'] }}</td>
                <td>{{ $rekap[$key]['total_halaman'] }} hal.</td>
            </tr>
        @endforeach
    </table>

    {{-- DETAIL RIWAYAT --}}
    <p class="section-title">Detail Riwayat Setoran</p>
    @foreach (['ziyadah' => 'Ziyadah', 'murojaah' => 'Murojaah', 'tadarus' => 'Tadarus'] as $key => $label)
        @if ($setorans->get($key) && $setorans->get($key)->count())
            <p class="jenis-heading">{{ $label }}</p>
            <table class="data">
                <tr>
                    <th>Tanggal</th>
                    <th>Tingkatan</th>
                    <th>Detail</th>
                    <th>Halaman</th>
                    <th>Nilai</th>
                    <th>Ustadz</th>
                </tr>
                @foreach ($setorans->get($key) as $s)
                    <tr>
                        <td>{{ $s->tanggal->translatedFormat('d M Y') }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $s->tingkatan)) }}</td>
                        <td>
                            @if ($s->tingkatan === 'iqro')
                                Iqro {{ $s->iqro_awal }} hal. {{ $s->halaman_iqro_awal }}
                                &rarr; Iqro {{ $s->iqro_akhir }} hal. {{ $s->halaman_iqro_akhir }}
                            @elseif ($s->tingkatan === 'juz_ama')
                                {{ $s->surah_awal }}:{{ $s->ayat_awal }}
                                &rarr; {{ $s->surah_akhir }}:{{ $s->ayat_akhir }}
                            @else
                                {{ $s->juz }}, hal. {{ $s->halaman_awal }}-{{ $s->halaman_akhir }}
                            @endif
                        </td>
                        <td>{{ $s->jumlah_halaman }}</td>
                        <td>{{ $s->nilai }}</td>
                        <td>{{ $s->ustadz->name ?? '-' }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endforeach

    {{-- TANDA TANGAN --}}
    <table class="ttd">
        <tr>
            <td>
                <span>Rajeg, {{ now()->translatedFormat('d F Y') }}</span>
                <span class="garis">Wali Kelas / Ustadz</span>
            </td>
        </tr>
    </table>

    <div class="footer-note">
        Dokumen ini dihasilkan otomatis oleh sistem GubukTahfidzATM &middot; Pondok Pesantren Al Ittihadul Mubarok,
        Rajeg, Tangerang
    </div>

</body>

</html>
