<x-layouts.app>
    <div id="hero">
        <livewire:components.hero />
    </div>
    <div id="mitra" class="px-4 pt-20 md:px-7">
        <livewire:components.container title="Mitra CSR" subtitle="Kabupaten Cirebon"
            fontClass="text-2xl md:text-3xl font-bold">
            <livewire:components.card-mitra />
            <div class="pt-12 md:pt-20">
                <livewire:components.container title="Data Statistik" class="items-center">
                    <div class="w-full px-4 py-8 md:py-12 lg:px-20">
                        <div class="flex flex-wrap justify-center w-full">
                            <livewire:components.data-stats value="124" subtitle="Total Proyek CSR" />
                            <livewire:components.data-stats value="119" subtitle="Proyek terealisasi" />
                            <livewire:components.data-stats value="89" subtitle="Mitra bergabung" />
                            <livewire:components.data-stats value="Rp200T +" subtitle="Dana realisasi CSR" />
                        </div>
                    </div>
                </livewire:components.container>
                <div class="flex flex-wrap w-full pt-12 md:pt-24">
                    <div class="w-full md:w-1/2">
                        <livewire:components.image-custom-grid />
                    </div>
                    <div class="w-full md:w-1/2">
                        <livewire:components.container title="Apa Itu" subtitle="Kegiatan CSR?"
                            fontClass="text-2xl md:text-3xl font-bold" class="items-start">
                            <livewire:components.about-csr />
                        </livewire:components.container>
                    </div>
                </div>
            </div>
        </livewire:components.container>
    </div>
    <div id="sektorCSR" class="pt-20 pb-5 text-white bg-dark">
        <livewire:components.container title="Sektor CSR" subtitle="Bidang sektor CSR Kabupaten Cirebon yang tersedia"
            class="text-base font-light" fontClass="pt-4">
            <div class="flex flex-wrap w-full">
                <div class="w-1/2 pt-10 px-14">
                    <livewire:components.according-csr />
                </div>
                <div class="relative w-1/2 py-10 px-14">
                    <div class="w-56 h-[215px] bg-primaryRed"></div>
                    <img src="{{ asset('images/bg-feature-airport.png') }}" class="absolute top-10 ml-7" width="300"
                        height="300" alt="">
                    <livewire:components.teks-csr />
                    <div class="flex gap-6 pt-4">
                        <x-mary-button label="Lihat program tersedia"
                            class="text-white border-none outline-none bg-secondaryRed hover:bg-secondaryRed hover:opacity-80" />
                        <x-mary-button label="Lihat realisasi program" class="text-white bg-transparent" />
                    </div>
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div class="flex flex-wrap w-full py-24">
        <div id="SambutanBupati" class="w-full p-4 md:w-1/2">
            <livewire:components.container title="Sambutan Bupati" subtitle="Kabupaten Cirebon"
                fontClass="text-2xl md:text-3xl font-bold">
                <livewire:components.teks-bupati />
            </livewire:components.container>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex items-end justify-end h-full bg-gray-100">
                <img src="{{ asset('images/bg-bupati-cirebon.png') }}" width="530" height="530"
                    alt="Bupati Cirebon">
            </div>
        </div>
    </div>

    <div id="kegiatan">
        <livewire:components.container title="Kegiatan Terbaru" class="items-center">
            <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-4 md:grid-cols-3 gap-7">
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-1.png"
                    description="testing" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-2.png"
                    description="testing" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-3.png"
                    description="testing" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-4.png"
                    description="testing" />

                <div class="flex items-center justify-center pt-6 col-span-full">
                    <x-mary-button label="Lihat semua kegiatan" class="btn-md btn-outline" />
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div id="kegiatan" class="pt-32">
        <livewire:components.container title="Laporan Program" subtitle="Terbaru"
            fontClass="text-2xl md:text-3xl font-bold" class="items-center">
            <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-4 md:grid-cols-3 gap-7">
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-1.png"
                    description="testing" name="Andri Sapulalung" avatar="avatar-1.png" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-2.png"
                    description="testing" name="Hesti Septian" avatar="avatar-2.png" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-3.png"
                    description="testing" name="Fera Pablo" avatar="avatar-3.png" />
                <livewire:components.card-with-button title="Judul Kegiatan Terbaru." images="bg-kegiatan-4.png"
                    description="testing" name="Fera Pablo" avatar="avatar-3.png" />

                <div class="flex items-center justify-center pt-6 col-span-full">
                    <x-mary-button label="Lihat semua laporan program" class="btn-md btn-outline" />
                </div>
            </div>
        </livewire:components.container>
    </div>

</x-layouts.app>
