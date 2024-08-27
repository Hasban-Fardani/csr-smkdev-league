<x-layouts.app>
    <div id="banner">
        <livewire:components.banner title="Sektor" subtitle="Program CSR Yang Sudah Berjalan Di Kabupaten Cirebon"
            breadcrumbs="Sektor" position="center" />
    </div>

    <div id="sektor" class="px-24 py-24">
        <livewire:components.container title="Sektor CSR" subtitle="Bidang program CSR Kabupaten Cirebon yang tersedia"
            fontClass="text-lg text-stone-500" class="items-center">
            <div class="grid grid-cols-1 py-10 lg:grid-cols-4 md:grid-cols-3 gap-7">
                <livewire:components.card-with-background title="Sosial" images="bg-kegiatan-1.png"
                    content="Tersedia: 10" />
                <livewire:components.card-with-background title="Lingkungan" images="bg-kegiatan-1.png"
                    content="Tersedia: 10" />
                <livewire:components.card-with-background title="Kesehatan" images="bg-kegiatan-1.png"
                    content="Tersedia: 10" />
                <livewire:components.card-with-background title="Pendidikan" images="bg-kegiatan-1.png"
                    content="Tersedia: 10" />
                <livewire:components.card-with-background title="Infrastruktur dan sanitasi lingkungan"
                    images="bg-kegiatan-1.png" content="Tersedia: 10" />
                <livewire:components.card-with-background title="Sarana dan prasarana keagamaan"
                    images="bg-kegiatan-1.png" content="Tersedia: 10" />
                <livewire:components.card-with-background title="Lainnya" images="bg-kegiatan-1.png"
                    content="Tersedia: 10" />
            </div>
        </livewire:components.container>
    </div>

    <div id="proyek" class="px-6">
        <livewire:components.container title="Proyek Tersedia">
            <div class="px-20">
                <div class="flex w-full gap-5 mt-5">
                    <x-mary-button label="Terbaru" icon-right="m-chevron-down" class="w-1/5 btn btn-outline" />
                    <x-mary-button label="Cari kegiatan..." icon="o-magnifying-glass" class="w-4/5 btn btn-outline" />
                </div>
                <div class="grid grid-cols-1 py-10 lg:grid-cols-4 md:grid-cols-3 gap-7">
                    <livewire:components.card-sector title="Sosial" images="bg-kegiatan-1.png" content="Sektor"
                        address="Jl. Sunan Kalijaga No.7, Sumber, Kec. Sumber, Kabupaten Cirebon, Jawa..."
                        date="Jul 15, 2024" />

                    <div class="flex items-center justify-center pt-6 col-span-full">
                        <x-mary-button label="Muat lebih banyak" class="btn-md btn-outline" />
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
                <img src="{{ asset('images/bg-basemap.png') }}" width="400" height="400" alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
