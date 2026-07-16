<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#a3e635">

    {{-- ================= SEO META ================= --}}
    <title>{{ $title ?? config('app.name') }}</title>

    <meta name="description"
        content="{{ $metaDescription ?? 'Aplikasi Hafalan Al-Quran untuk memudahkan pencatatan dan pemantauan hafalan santri.' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'hafalan quran, aplikasi hafalan, tahfidz, pondok pesantren' }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="{{ $metaRobots ?? 'index, follow' }}">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph (Facebook, WhatsApp, dll) --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? config('app.name') }}">
    <meta property="og:description"
        content="{{ $metaDescription ?? 'Aplikasi Hafalan Al-Quran untuk memudahkan pencatatan dan pemantauan hafalan santri.' }}">
    <meta property="og:image" content="{{ asset('images/LOGO-ATM-pdf.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? config('app.name') }}">
    <meta name="twitter:description"
        content="{{ $metaDescription ?? 'Aplikasi Hafalan Al-Quran untuk memudahkan pencatatan dan pemantauan hafalan santri.' }}">
    <meta name="twitter:image" content="{{ asset('images/LOGO-ATM-pdf.png') }}">

    {{-- ================= FAVICON / LOGO DI TAB BAR ================= --}}
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO-ATM-pdf.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/LOGO-ATM-pdf.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/LOGO-ATM-pdf.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="antialiased bg-[--color-neutral-50]">

    {{-- Skip link — aksesibilitas keyboard --}}
    <a href="#main-content"
        class="sr-only focus:not-sr-only focus:fixed focus:top-2 focus:left-2 focus:z-[100] focus:bg-white focus:px-4 focus:py-2 focus:rounded-md focus:shadow-lg">
        Lewati ke konten utama
    </a>

    <div class="page-wrapper">

        {{-- Navbar --}}
        <livewire:component.navbar />

        {{-- Toast Notifications --}}
        <livewire:component.notify />

        {{-- Konten Halaman --}}
        <main id="main-content" class="{{ $bareMain ?? false ? '' : 'container-app' }}"
            style="{{ $bareMain ?? false ? 'flex: 1;' : 'margin-top: calc(var(--navbar-height) + 1.5rem); margin-bottom: 3rem; flex: 1;' }}">
            {{ $slot }}
        </main>

    </div>

    @livewireScripts
</body>

</html>
