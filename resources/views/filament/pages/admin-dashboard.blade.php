<x-filament-panels::page>
    {{-- hero section --}}
    <div class="relative">
        <img class="h-[240px]" src="{{asset('images/bg-kantor-pemerintah.png')}}" alt="kantor pemerintah">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-white w-full">
            <h1 class="mb-5 text-3xl font-bold">Selamat Datang di Dashboard CSR Kabupaten Cirebon</h1>
            <p class="mb-5">
                Lapor dan ketahui program CSR Anda
            </p>
        </div>
    </div>

    @if (method_exists($this, 'filtersForm'))
        {{ $this->filtersForm }}
    @endif

    <div>
    <h2 class="text-3xl font-semibold">Data Statistik</h2>
    
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
            <x-mary-card class="bg-orange-600 text-white">
                <h3 class="font-semibold mb-2">Total Proyek CSR</h3>
                <x-mary-card class="bg-orange-400 border border-white">
                    <p class="text-xl font-bold">{{ $totalProjects }}</p>
                </x-mary-card>
            </x-mary-card>
    
            <x-mary-card class="bg-purple-800 text-white">
                <h3 class="font-semibold mb-2">Proyek Terealisasi</h3>
                <x-mary-card class="bg-purple-500 border border-white">
                    <p class="text-xl font-bold">{{ $completedProjects }}</p>
                </x-mary-card>
            </x-mary-card>
    
            <x-mary-card class="bg-blue-800 text-white">
                <h3 class="font-semibold mb-2">Mitra Bergabung</h3>
                <x-mary-card class="bg-blue-500 border border-white">
                    <p class="text-xl font-bold">{{ $partnersCount }}</p>
                </x-mary-card>
            </x-mary-card>
    
            <x-mary-card class="bg-green-800 text-white">
                <h3 class="font-semibold mb-2">Total Dana Realisasi CSR</h3>
                <x-mary-card class="bg-green-500 border border-white">
                    <p class="text-xl font-bold">{{ $totalFunds }}</p>
                </x-mary-card>
            </x-mary-card>
        </div>
    </div>

    <h2 class="text-3xl font-semibold">Realisasi Project CSR</h2>
    <div class="bg-white p-8">
        <x-filament-widgets::widgets
            :columns="$this->getColumns()"
            :data="
                [
                    ...(property_exists($this, 'filters') ? ['filters' => $this->filters] : []),
                    ...$this->getWidgetData(),
                ]
            "
            :widgets="$this->getVisibleWidgets()"
        />
    </div>
    <style>
        .fi-wi-chart > section {
            @apply border-none ring-0 shadow-none;
        }
    </style>
</x-filament-panels::page>
