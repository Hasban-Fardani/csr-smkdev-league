<x-filament-panels::page>
    {{-- hero section --}}
    <div class="hero">
        <img src="{{asset('storage/images/bg-kantor-pemerintah.png')}}" alt="kantor pemerintah" class="h-full">
        <div class="hero-image-overlay">
            <p class="thumbnail-title">Selamat Datang di Dashboard CSR Kabupaten Cirebon</p>
            <p class="thumbnail-text">Lapor dan ketahui program CSR anda</p>
        </div>
    </div>

    <div class="mt-72 md:mt-80">
        @if (method_exists($this, 'filtersForm'))
            {{ $this->filtersForm }}
        @endif
    </div>

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
                    <p class="text-xl font-bold">Rp {{ number_format($totalFunds, 0, ',', '.') }}</p>
                </x-mary-card>
            </x-mary-card>
        </div>
    </div>

    <h2 class="text-3xl font-semibold">Realisasi Project CSR</h2>
    <div class="bg-white p-8 rounded-xl">
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
</x-filament-panels::page>
