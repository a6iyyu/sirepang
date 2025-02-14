<a
    @if ($sidebar) id="route" @endif
    href="{{ route(strtolower(str_replace(' ', '-', $route))) }}"
    class="{{ $style }}"
>
    @if ($route === 'keluarga')
        <span class="flex items-center">
            <i class="{{ $icon }}"></i>
            <h5 @if ($sidebar) id="sidebar-menu" @endif class="ml-4">{{ $label }}</h5>
        </span>
        {{-- <i class="fa-solid fa-chevron-down w-full !flex items-center justify-end text-sm lg:hidden"></i> --}}
    @else
        <i class="{{ $icon }}"></i>
        <h5 @if ($sidebar) id="sidebar-menu" @endif class="ml-4">{{ $label }}</h5>
    @endif
</a>