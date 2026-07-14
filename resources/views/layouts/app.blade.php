<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#a3e635">

    <title>{{ $title ?? config('app.name') }}</title>

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
