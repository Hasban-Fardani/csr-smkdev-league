<x-layouts.app>
    <div id="banner">
        <livewire:components.banner :title="$report->title" :subtitle="$report->partner->company_name . ' - ' . $report->project->start_date" breadcrumbs="Laporan / Rincian" position="center"
            :tags="$report->project->sectorProgram->name" />
    </div>

    <div id="imageCompany" class="pt-10">
        <livewire:components.container>
            <div class="flex flex-col items-center bg-gray-50 min-h-[30vh] justify-center">
                <img src="{{ asset('storage/logos/loreal.png') }}" alt="logo" width="150" height="150"
                    class="h-auto">
            </div>
            <div class="px-20 mb-5">
                <h1 class="mt-8 text-lg font-semibold">Galeri</h1>
            </div>

            <div class="grid grid-cols-1 gap-4 px-20 sm:grid-cols-2 lg:grid-cols-4 bg-gray-25">
                @php
                    $images = json_decode($report->files, true);
                @endphp

                @foreach ($images as $image)
                    <img src="{{ asset($image) }}" alt="{{ $report->files }}" class="object-cover w-full h-auto">
                @endforeach
            </div>

            <div class="grid grid-cols-1 gap-4 px-20 pt-8 sm:grid-cols-2 lg:grid-cols-3">
                <livewire:components.card-report title="Realisasi" :value="'Rp ' . number_format((float) $report->funds, 0, ',', '.')" />
                <livewire:components.card-report title="Nama Proyek" :value="$report->project->title" />
                <livewire:components.card-report title="Kecamatan" :value="$report->project->subdistrict->name" />
            </div>

            <div class="px-20 mb-5">
                <h1 class="mt-8 text-lg font-semibold">Rincian Laporan</h1>
                <p class="text-base">{{ $report->project->description }}</p>
            </div>

            <div id="kegiatan" class="py-10">
                <livewire:components.container title="Laporan Lainnya">
                    <div class="grid grid-cols-1 px-4 py-10 lg:px-24 md:px-12 lg:grid-cols-3 md:grid-cols-3 gap-7">
                        @forelse ($reports as $report)
                            @php
                                $images = json_decode($report->files, true);
                            @endphp

                            <livewire:components.card-with-button :title="$report->title" :images="$images[0]" :description="$report->description"
                                name="admin" avatar="avatars/avatar-1.png" link="/report/{{ $report->id }}"
                                :date="$report->realization_date" />
                        @empty
                            <h1>tidak ada data</h1>
                        @endforelse

                        <div class="flex items-center justify-center pt-6 pb-10 col-span-full">
                            <x-mary-button label="Lihat semua kegiatan" class="btn-md btn-outline" link="/report" />
                        </div>
                    </div>
                </livewire:components.container>
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
