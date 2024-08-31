<x-layouts.app>
    <div id="banner">
        <livewire:components.banner title="Statistik" subtitle="Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon"
            breadcrumbs="Statistik" position="center" />
    </div>

    <div id="stats" class="py-16">
        <livewire:components.container title="Data Statistik" class="items-center">
            <div class="flex w-full gap-5 px-24 pt-10">
                <x-mary-button label="Terbaru" icon-right="o-calendar" class="justify-between w-1/3 btn btn-outline" />
                <x-mary-button label="Cari kegiatan..." icon-right="o-calendar"
                    class="justify-between w-1/3 btn btn-outline" />
                <div class="flex w-1/3 gap-3">
                    <x-mary-button icon="o-arrow-down-tray" class="btn btn-outline" label="Unduh .csv" />
                    <x-mary-button icon="o-arrow-down-tray" class="btn btn-outline" label="Unduh .pdf" />
                </div>
            </div>

            <div class="w-full px-4 md:py-12 lg:px-24">
                <div class="flex flex-wrap justify-center w-full">
                    <livewire:components.data-stats value="{{ $countedProject }}" subtitle="Total Proyek CSR" />
                    <livewire:components.data-stats value="{{ $countedProjectRealized }}"
                        subtitle="Proyek terealisasi" />
                    <livewire:components.data-stats value="{{ $countedMitra }}" subtitle="Mitra bergabung" />
                    <livewire:components.data-stats value="Rp {{ $formatedFunds }} M +" subtitle="Dana realisasi CSR" />
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div id="charts" class="px-4">
        <livewire:components.container title="Realisasi" subtitle="Proyek CSR"
            fontClass="text-2xl md:text-3xl font-bold">
            <div class="px-20">
                <div class="flex flex-wrap w-full">
                    <div class="w-1/2 p-2">
                        @livewire(App\Filament\Admin\Widgets\RealizationSectorPie::class)
                    </div>
                    <div class="w-1/2 p-2">
                        @livewire(App\Filament\Admin\Widgets\RealizationTotalPercentPT::class)
                    </div>
                </div>
                <div class="flex flex-wrap w-full">
                    <div class="w-1/2 p-2">
                        @livewire(App\Filament\Admin\Widgets\RealizationTotalPercentPT::class)
                    </div>
                    <div class="w-1/2 p-2">
                        @livewire(App\Filament\Admin\Widgets\RealizationTotalPercentPT::class)
                    </div>
                </div>
            </div>
            </livewire:components.container>
    </div>

    <div class="flex flex-wrap w-full pt-10">
        <div id="contact" class="w-full p-4 md:w-1/2">
            <livewire:components.container title="Hubungi Kami"
                subtitle="hubungi kami melalui formulir di samping, atau melalui kontak di bawah"
                fontClass="pt-4 text-stone-500">
                <div class="px-20 py-8">
                    <livewire:components.contact-form icon="o-map-pin" title="Alamat"
                        content="Jl. Sunan Kalijaga No.7,Sumber, Kec. Sumber, Kabupaten Cirebon,
                        Jawa Barat 45611" />
                    <livewire:components.contact-form icon="o-phone" title="Phone"
                        content="(0231) 321197 atau (0231) 3211792" />
                    <livewire:components.contact-form icon="o-envelope" title="Email"
                        content="pemkab@cirebonkab.go.id" />
                </div>
            </livewire:components.container>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex items-start justify-center h-full p-16">
                <img src="{{ asset('storage/images/bg-basemap.png') }}" width="400" height="400" alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
