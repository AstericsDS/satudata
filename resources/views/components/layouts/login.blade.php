<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>{{ $title ?? 'SATU DATA' }}</title>
</head>

<body class="min-h-screen bg-[url('/public/images/login_bg.jpg')] bg-cover flex justify-center items-center bg-center">
    <livewire:login />
</body>

</html>
