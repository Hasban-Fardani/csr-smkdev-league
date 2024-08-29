<x-layouts.app>
    <div id="banner">
        <livewire:components.banner :title="$report->title" :subtitle="$report->partner->company_name . ' - ' . $report->project->start_date" breadcrumbs="Laporan / Rincian" position="center"
            :tags="$report->project->sectorProgram->name"  />
    </div>

    <div id="imageCompany" class="py-10">
        <livewire:components.container>
            <div class="flex justify-center w-full px-20 bg-gray-50">
                <!-- FOR EXAMPLE -->
                <img src="{{ asset('storage/blog-post-1.webp') }}" height="500" width="500" alt="{{ $report->title }}">

                <!-- FOR PRODUCTION -->
                {{-- <img src="{{ asset('storage/' . $report->partner->logo) }}" alt="{{ $report->title }}"> --}}
            </div>

            <!-- IMAGE GALERY START -->
            <!-- IMAGE GALERY END -->

            <div class="flex items-center p-4 rounded-lg shadow-md bg-red-50">
                <div class="h-full bg-red-600 rounded-l-lg"></div>
                <div class="ml-3">
                    <p class="text-sm text-gray-500">Realisasi</p>
                    <p class="text-xl font-semibold text-gray-900">Rp 10,000,000</p>
                </div>
            </div>
            
        </livewire:components.container>
    </div>
</x-layouts.app>
