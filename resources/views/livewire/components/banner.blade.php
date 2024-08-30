<div class="relative w-full min-h-80">
    <div class="w-1/2 bg-primaryRed h-full absolute -z-[999]"></div>
    <div class="px-10 pt-10 pb-16">
        <div class="flex flex-wrap w-full bg-center bg-cover"
            style="background-image: url('{{ asset('storage/images/bg-balai-kota-darker.png') }}'); background-position: {{ $position }};">
            <div class="container flex items-center w-full">
                <!-- left section `welcome` -->
                <div class="flex items-center justify-center w-full min-h-80 md:w-2/3">
                    <div class="flex flex-col max-w-xl gap-5 p-6 text-white md:p-10">
                        <h3 class="text-base"><span class="text-orange-600">Beranda</span> / {{ $breadcrumbs }}</h3>
                        <h1 class="text-5xl font-bold leading-tight md:text-6xl">{{ $title }}</h1>
                        @if ($subHeading)
                            <p class="text-sm">{{ $subHeading }}</p>
                        @endif

                        <p class="text-sm">{{ $subtitle }}</p>
                        
                        @if ($tags)
                            <livewire:components.tags :tag="$tags" class="text-white border-none bg-opacity-40" />
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
