<div class="px-4 md:px-14">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-4">
            <div class="flex justify-center col-span-2 pl-14 pt-14 md:col-span-1">
                <img src="{{ asset('storage/images/' . $images[0]) }}" alt="Image 1"
                    class="">
            </div>
            <div class="flex justify-center col-span-1 -mb-16">
                <img src="{{ asset('storage/images/' . $images[1]) }}" width="400" height="500" alt="Image 2"
                    class="object-contain w-full">
            </div>
            <div class="flex justify-center col-span-2 md:col-span-1">
                <img src="{{ asset('storage/images/' . $images[2]) }}" alt="Image 3"
                    class="object-cover">
            </div>
        </div>
    </div>
</div>