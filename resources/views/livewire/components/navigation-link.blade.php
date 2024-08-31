<div class="flex gap-10">
    @foreach ($links as $link)
        @php
            $isActive = $link['url'] === '/' ? request()->path() === '/' : request()->is(ltrim($link['url'], '/'));
        @endphp
        <a href="{{ $link['url'] }}"
           class="text-sm transition duration-300 ease-in-out
                  {{ $isActive ? 'underline font-semibold text-secondaryRed' : 'hover:underline hover:text-secondaryRed hover:font-semibold active:underline active:text-secondaryRed' }}">
            {{ $link['label'] }}
        </a>
    @endforeach
</div>