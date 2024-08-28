<x-filament-panels::page>
    <div class="hero">
        <img src="{{ asset('images/bg-balai-kota.png') }}" alt="" class="hero-image">
        <div class="hero-image-overlay">
            <p class="thumbnail-title">Selamat Datang di Dashboard CSR Kabupaten Cirebon</p>
            <p class="thumbnail-text">Lapor dan ketahui program CSR anda</p>
        </div>
    </div>
    <p class="text-2xl after-hero"><strong>Data Statistik</strong>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="grid-item-stat">
                <div class="grid-item-stat-header">
                    <div class="bg-white rounded-full grid-item-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40px" height="40px" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                    </div>
                    <p class="grid-item-stat-title">Total Proyek CSR</p>
                </div>
                <p class="value">1.000</p>
            </div>
            <div class="grid-item-stat grid-item-stat-green">
                <div class="grid-item-stat-header">
                    <div class="bg-white rounded-full grid-item-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40px" height="40px" stroke-width="1.5" stroke="currentColor" class="size-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <p class="grid-item-stat-title">Proyek Terealisasi</p>
                </div>
                <p class="value">1.000</p>
            </div>
            <div class="grid-item-stat grid-item-stat-orange">
                <div class="grid-item-stat-header">
                    <div class="bg-white rounded-full grid-item-stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="40px" height="40px" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <p class="grid-item-stat-title">Dana Realisasi Proyek Mitra</p>
                </div>
                <p class="value">Rp10.000.000</p>
            </div>
        </div>
    </p>
    <p class="text-2xl"><strong>Realisasi Proyek CSR</strong></p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="grid-item">
            @livewire(\App\Filament\Partner\Resources\PartnerResource\Widgets\RealizationTotalChart::class)
            @livewire(\App\Filament\Partner\Resources\PartnerResource\Widgets\RealizationTotalChart::class)
        </div>
        <div class="grid-item md:col-span-2">
            @livewire(\App\Filament\Partner\Resources\PartnerResource\Widgets\RealizationTotalChart::class)
        </div>
    </div>

    {{-- @include('livewire.partner-activity-table') --}}
</x-filament-panels::page>
