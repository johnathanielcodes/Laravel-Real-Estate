<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased relative">
    <div x-data="{ userDropdownOpen: false, mobileNavOpen: false }">
        <!-- Page Container -->
        <div id="page-container" class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-slate-100">
            <!-- Page Header -->
            <livewire:dashboard-header />
            <!-- Page Content -->
            <main id="page-content" class="flex max-w-full flex-auto flex-col">
                <div class="container mx-auto p-4 lg:p-8 xl:max-w-full">
                    <div class="grid grid-cols-1 md:gap-20 lg:grid-cols-12">
                        <!-- Navigation -->
                        <livewire:dashboard-side-nav />
                        <!-- END Navigation -->

                        <!-- Main Content -->
                        <div class="lg:col-span-9">
                            {{ $slot }}
                        </div>
                        <!-- END Main Content -->
                    </div>
                </div>
            </main>
            <!-- END Page Content -->

            <!-- Page Footer -->
            <livewire:dashboard-footer />
            <!-- END Page Footer -->
        </div>
    </div>
</body>

</html>
