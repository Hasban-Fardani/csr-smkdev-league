<!DOCTYPE html>
<html lang="en" data-theme="light">

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
            <div class="flex items-center justify-between w-full">
                <div class="flex w-1/3 gap-2 pl-20">
                    <img src="{{ asset('storage/logos/logo-cirebon.png') }}" class="w-8 h-8" width="40" height="40"
                        alt="">
                    <div class="flex flex-col">
                        <h1 class="text-[.8rem] font-bold">PEMERINTAH</h1>
                        <h3 class="text-[.6rem] font-bold">Kabupaten Cirebon</h3>
                    </div>
                </div>

                <div class="flex w-2/3 gap-10">
                    <a href="/"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Beranda</a>
                    <a href="/about"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Tentang</a>
                    <a href="/activity"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Kegiatan</a>
                    <a href="/stats"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Statistik</a>
                    <a href="/sector"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Sektor</a>
                    <a href="/report"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Laporan</a>
                    <a href="/mitra"
                        class="text-sm transition duration-300 ease-in-out hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed">Mitra</a>
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
    <main>
        {{ $slot }}
    </main>

    {{--  TOAST area --}}
    <x-mary-toast />
</body>

</html>
