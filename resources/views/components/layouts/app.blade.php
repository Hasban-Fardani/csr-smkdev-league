<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }} CSR Cirebon</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-helvetica scroll-smooth">
    {{-- The navbar with `sticky` and `full-width` --}}
    <x-mary-nav sticky full-width>

        <x-slot:brand class="justify-center">
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="mr-3 lg:hidden">
                {{-- <x-icon name="o-envelope" class="cursor-pointer" /> --}}
            </label>

            {{-- Brand --}}
            <div class="flex justify-between w-full">
                <div class="flex w-1/3 gap-2 px-10">
                    <img src="{{ asset('logos/logo-cirebon.png') }}" width="40" height="40" alt="">
                    <div class="flex flex-col">
                        <h1 class="text-sm font-bold tracking-[.16em]">PEMERINTAH</h1>
                        <h3 class="text-xs font-bold">Kabupaten Cirebon</h3>
                    </div>
                </div>

                <!-- NAVBAR!!! -->
                <div class="w-2/3">
                    <x-mary-button label="Beranda" class="btn-link" />
                    <x-mary-button label="Tentang" class="btn-link" />
                    <x-mary-button label="Kegiatan" class="btn-link" />
                    <x-mary-button label="Statistik" class="btn-link" />
                    <x-mary-button label="Sektor" class="btn-link" />
                    <x-mary-button label="Laporan" class="btn-link" />
                    <x-mary-button label="Mitra" class="btn-link" />
                </div>
            </div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button label="Pengajuan" link="/pengajuan"
                class="text-white bg-secondaryRed btn-sm hover:bg-secondaryRed hover:opacity-80" responsive />
        </x-slot:actions>
    </x-mary-nav>

    {{-- The main content with `full-width` --}}
    <x-mary-main with-nav full-width>

        {{-- This is a sidebar that works also as a drawer on small screens --}}
        {{-- Notice the `main-drawer` reference here --}}

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{--  TOAST area --}}
    <x-mary-toast />
</body>

</html>
