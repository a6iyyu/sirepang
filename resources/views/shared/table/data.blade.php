<figure class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
    <div class="p-4 md:p-5 flex items-center">
        <span class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></span>
        <h5 class="text-emerald-800 font-medium text-base">{{ $name }}</h5>
    </div>
    <figcaption class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
        @if (isset($value))
            <h5 class="font-medium">{{ $value }}</h5>
        @else
            <h5 class="text-gray-400">—</h5>
        @endif
    </figcaption>
</figure>