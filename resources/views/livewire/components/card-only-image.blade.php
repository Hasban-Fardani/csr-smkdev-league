<a href="{{ $link }}" class="relative grid-cols-1 transition duration-300 ease-in-out hover:scale-95">
    <div class="flex flex-col border">
        <img src="{{ asset($images) }}" alt="{{ $title }}" height="200" width="200" class="w-full bg-gray-50 min-h-32">

        <div class="flex flex-col gap-4 px-4 py-5">
            <h1 class="text-xl font-semibold">{{ $title }}</h1>
        </div>
    </div>
</a>
