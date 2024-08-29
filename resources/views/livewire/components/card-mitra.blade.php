<div class="px-2 py-4 lg:px-10 md:px-4">
    <div class="grid grid-cols-2 border-gray-200 px-14 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-5">
        <!-- mapping logo -->
        @foreach ($logoMitra as $mitra)
            <div class="flex items-center justify-center col-span-1 p-5 border-b border-r border-gray-200 md:p-7">
                <img src="{{ asset('storage/logos/' . $mitra) }}" alt="" class="h-auto max-w-full">
            </div>
        @endforeach
    </div>
</div>