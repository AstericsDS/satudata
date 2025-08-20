<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/unj.png') }}">
    @livewireStyles
</head>

<body class="min-h-screen">

    {{-- Navbar --}}
    <livewire:admin.navbar />

        <div class="grid grid-cols-[250px_1fr] min-h-dvh">

            {{-- Sidebar --}}
            <livewire:admin.sidebar />

            {{-- Content --}}
            {{ $slot }}
        </div>

    @livewireScripts
</body>

</html>
