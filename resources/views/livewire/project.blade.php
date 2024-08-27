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
                        @foreach ($images as $image)
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $projects->title }}">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $projects->title }}">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $projects->title }}">
                            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $projects->title }}">
                        @endforeach
                    </div>
                </div>

                <!-- MITRA SECTION FROM REPORT TABLE WITH REPORT FILE-->
                
            </div>
        </livewire:components.container>
    </div>
</x-layouts.app>
