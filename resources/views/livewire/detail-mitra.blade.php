<x-layouts.app>
    <div id="banner">
        <livewire:components.banner :title="$mitra->company_name" breadcrumbs="Mitra / Detail" position="center"
            subHeading="{{ $mitra->company_name }} - {{ $mitra->email }} - {{ $phone }}" :subtitle="$mitra->address" />
    </div>

    <div id="detailMitra" class="px-40 pt-20 pb-10">
        <livewire:components.container>
            <div class="px-4 md:px-20">
                <div class="flex flex-col my-5">
                    <div class="flex items-center justify-center w-full bg-gray-50">
                        <img src="{{ asset($mitra->logo) }}" alt="{{ $mitra->company_name }}"
                            class="object-contain w-48 h-48">
                    </div>
                    <p class="mt-4 text-lg text-gray-600">
                        {{ $mitra->description }}
                    </p>
                </div>
            </div>

        </livewire:components.container>
    </div>

    <div class="px-28 divider"></div>

    <div id="laporan" class="px-10 pt-10">
        <livewire:components.container title="Laporan Dari Mitra">
            <div class="grid grid-cols-1 px-20 py-10 lg:grid-cols-4 md:grid-cols-3 gap-7">
                @forelse ($reports as $report)
                    @php
                        $images = $report->files
                    @endphp
    
                    <livewire:components.card-with-button :title="$report->title" :images="$images[0]" :description="$report->description"
                        link="/report/{{ $report->id }}" :date="$report->realization_date" />
                @empty
                    <h1>tidak ada data</h1>
                @endforelse
    
                <div class="flex items-center justify-center pt-6 pb-10 col-span-full">
                    <x-mary-button label="Lihat semua laporan" class="btn-md btn-outline" link="/report" />
                </div>
            </div>
        </livewire:components.container>
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
                <img src="{{ asset('storage/images/bg-basemap.png') }}" width="400" height="400"
                    alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
