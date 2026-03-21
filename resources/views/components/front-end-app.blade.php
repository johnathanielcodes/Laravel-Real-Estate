<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .primary-color {
            color: [#FF8F20] !important;
        }
    </style>
</head>

<body class="antialiased font-sans">
    @include('sweetalert2::index')
    <livewire:front-end-navigation />

    <main class="max-w-full p-2 content-center mx-auto">
        {{ $slot }}
    </main>
    <livewire:footer />
</body>


</html>
