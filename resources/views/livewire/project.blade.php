<x-layouts.app>
    <div id="banner">
        <livewire:components.banner :title="$projects->title" :subtitle="$projects->subdistrict_name"
            subHeading="Mulai: {{ $projects->start_date }} . Akhir: {{ $projects->end_date }}"
            breadcrumbs="Program / Sosial / Proyek" position="center" />
    </div>

    <div id="project" class="px-8 py-10">
        <livewire:components.container title="Deskripsi Proyek">
            <div class="px-20 pt-3">
                <p class="text-base text-stone-500">{{ $projects->description }}</p>
                <div class="mt-5">
                    <h1 class="text-lg font-semibold">Galeri</h1>
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-4 lg:grid-cols-4">
                        @php
                            $images = json_decode($projects->images, true);
                        @endphp

                        @if (is_array($images))
                            @foreach ($images as $image)
                                <img src="{{ asset($image) }}" alt="{{ $projects->title }}" width="100"
                                    height="100" class="w-full">
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </livewire:components.container>
    </div>

    <div id="table">
        <livewire:components.project-table />
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
