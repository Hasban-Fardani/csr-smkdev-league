<div class="relative grid-cols-1">
    <div class="flex flex-col border">
        <img src="{{ asset('storage/' . $images) }}" alt="{{ $title }}">

        <div class="flex flex-col gap-4 px-4 py-5">
            <h1 class="text-xl font-semibold min-h-14">{{ $title }}</h1>
            <p class="w-2/4 p-2 text-sm bg-gray-100 rounded text-stone-500">{{ $content }}</p>
            <x-mary-button label="Lihat detail" link="{{ $link }}"
                class="text-white btn-sm bg-secondaryRed hover:bg-secondaryRed hover:opacity-80" />
        </div>
    </div>
</div>
