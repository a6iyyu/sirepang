<a
    @if ($sidebar) id="route" @endif
    href="{{ route(strtolower(str_replace(' ', '-', $route))) }}"
    class="{{ $style }}"
>
    <i class="{{ $icon }}"></i>
    <h5 @if ($sidebar) id="sidebar-menu" @endif class="ml-4">{{ $label }}</h5>
</a>