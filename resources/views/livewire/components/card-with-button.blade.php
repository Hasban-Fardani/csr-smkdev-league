<div class="relative grid-cols-1">
    <div class="flex flex-col border">
        <x-mary-button label="27 MAR, 2023"
            class="absolute text-[0.72rem] text-white border-none outline-none top-5 left-7 bg-secondaryRed btn-sm" />
        <img src="{{ asset('images/' . $images) }}" alt="{{ $title }}">

        <!-- avatar section-->
        @if (!empty($avatar))
            <div class="flex items-center gap-3 px-5 pt-6">
                <div class="avatar">
                    <div class="w-8 rounded-full">
                        <img src="{{ asset('avatars/' . $avatar) }}" />
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold text-stone-500">{{ $name }}</p>
                </div>
            </div>
        @endif
        <div class="flex flex-col gap-4 px-4 py-5">
            <h1 class="text-xl font-semibold">{{ $title }}</h1>
            <p class="text-sm text-gray-500">{{ $description }}</p>
        </div>
    </div>
</div>
