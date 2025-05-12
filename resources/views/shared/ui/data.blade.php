<figure class="grid cursor-pointer grid-cols-1 transition-all duration-200 hover:bg-emerald-50/50 md:grid-cols-2">
    <div class="flex items-center p-4 md:p-5">
        <span class="mr-4 h-12 w-1.5 rounded-full bg-emerald-700"></span>
        <h5 class="text-base font-medium text-emerald-800">{{ $name }}</h5>
    </div>
    <figcaption class="flex items-center p-4 text-gray-800 md:justify-end md:p-5 md:text-right">
        @if (isset($value))
            <h5 class="font-medium">{{ $value }}</h5>
        @else
            <h5 class="text-gray-400">—</h5>
        @endif
    </figcaption>
</figure>