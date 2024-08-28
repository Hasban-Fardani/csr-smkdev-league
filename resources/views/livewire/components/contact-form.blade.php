<div class="flex w-full">
    <x-mary-icon name="{{ $icon }}"
        class="flex-shrink-0 w-10 h-10 p-2 rounded-full text-error-700 bg-error-100 ring-error-50 ring ring-offset-2" />
    <div class="flex flex-col gap-3 px-4 py-2">
        <h1 class="text-lg font-bold">{{ $title }}</h1>
        <p class="text-base font-bold text-error-700">{{ $content }}</p>
    </div>
</div>
