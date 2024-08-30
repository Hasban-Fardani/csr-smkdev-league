<x-layouts.app>
    <div id="banner">
        <livewire:components.banner :title="$activity->name" subtitle="July 12, 2024" breadcrumbs="Kegiatan / Detail"
            position="center" />
    </div>

    <div id="detailActivity" class="px-40 pt-20 pb-10">
        <livewire:components.container>
            <div class="px-20">
                <p class="text-lg text-gray-500">
                    {!! $activity->description !!}
                </p>
                <div class="flex flex-col my-10">
                    <img src="{{ asset($activity->image) }}" alt="{{ $activity->name }}">
                    <a href="https://www.figma.com/exit?url=https%3A%2F%2Fwww.pexels.com%2Fphoto%2Fphoto-of-woman-leaning-on-wooden-table-3182746%2F"
                        target="_blank" class="pt-3 text-sm text-gray-500">sumber gambar: <span
                            class="underline">Pexels</span></a>
                </div>
                <p class="text-lg text-gray-500">{!! $activity->description !!}</p>

                <div class="mt-16 divider"></div>

                <div class="flex flex-col">
                    <div>
                        @foreach ($activity->tags as $tag)
                            <livewire:components.tags :tag="$tag" />
                        @endforeach
                    </div>
                    <div class="flex justify-end mt-10">
                        <livewire:components.sosmed-container />
                    </div>
                </div>
            </div>
        </livewire:components.container>
    </div>

    <div class="px-28 divider"></div>

    <div id="kegiatan" class="px-8 pt-10 pb-20">
        <livewire:components.container title="Kegiatan Terbaru">
            <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-4 md:grid-cols-3 gap-7">
                @forelse ($activities as $activity)
                    <livewire:components.card-with-button :title="$activity->name" :images="$activity->image" :description="$activity->description"
                        link="/activity/{{ $activity->id }}" :date="$activity->published_data" />
                @empty
                    <h1>tidak ada data</h1>
                @endforelse

                <div class="flex items-center justify-center pt-6 col-span-full">
                    <x-mary-button label="Lihat semua kegiatan" class="btn-md btn-outline" link="/activity" />
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
                <img src="{{ asset('storage/images/bg-basemap.png') }}" width="400" height="400" alt="Map Cirebon">
            </div>
        </div>
    </div>

    <livewire:components.footer />
</x-layouts.app>
