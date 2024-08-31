<x-layouts.app>
    <div id="banner">
        <livewire:components.banner title="Laporan" subtitle="Kegiatan Terkini Dari CSR Kabupaten Cirebon"
            breadcrumbs="Laporan" position="center" />
    </div>
    <div id="kegiatan" class="px-20 py-10">
        <div class="flex w-full gap-5">
            <x-mary-button label="Terbaru" icon-right="m-chevron-down" class="w-1/5 btn btn-outline" />
            <x-mary-button label="Cari kegiatan..." icon="o-magnifying-glass" class="w-4/5 btn btn-outline" />
        </div>
        <div class="grid grid-cols-1 px-4 py-10 lg:grid-cols-4 md:grid-cols-3 gap-7">
            @forelse ($reports as $report)
                @php
                    $images = $report->files
                @endphp

                <livewire:components.card-with-button :title="$report->title" :images="$images[0]" :description="$report->description"
                    name="admin" avatar="avatars/avatar-1.png" link="/report/{{ $report->id }}" :date="$report->realization_date" />
            @empty
                <h1>tidak ada data</h1>
            @endforelse

            <div class="flex items-center justify-center pt-6 pb-10 col-span-full">
                <x-mary-button label="Muat lebih banyak" class="btn-md btn-outline" link="/report" />
            </div>
        </div>
    </div>

    <div class="flex flex-wrap w-full">
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
