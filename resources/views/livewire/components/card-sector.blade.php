<a class="relative grid-cols-1">
    <div class="flex flex-col border">
        <img src="{{ asset('storage/' . $images) }}" alt="{{ $title }}">

        <div class="flex flex-col gap-4 px-4 py-5">
            <h1 class="text-xl font-semibold min-h-14">{{ $title }}</h1>
            <p class="p-2 text-sm rounded bg-stone-100 text-stone-500">{{ $address }}</p>
            <p class="p-2 text-sm rounded bg-stone-100 text-stone-500">{{ $content }}</p>
            <p class="p-2 text-sm rounded bg-stone-100 text-stone-500">Tgl. Berakhir: {{ $date }}</p>
        </div>
    </div>
</a>
