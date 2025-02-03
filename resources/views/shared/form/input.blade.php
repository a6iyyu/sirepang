<fieldset class="flex flex-col space-y-4">
    <label for="{{ $name }}" class="font-medium">
        {{ $label }}
        @if (!empty($required))
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        @if (!empty($icon))
            <i class="{{ $icon }} absolute inset-y-0 top-4.5 left-0 flex items-center pl-5 text-gray-500"></i>
        @endif
        <input
            type="{{ $type ?? 'text' }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="w-full rounded-lg border-2 pl-12 pr-4 py-2.75 transition-all duration-200 text-gray-700 focus:outline-none focus:border-[#1a4167] focus:ring-2 focus:ring-[#1a4167]/20 @error($name) border-red-500 @enderror"
            value="{{ old($name) }}"
            @if (!empty($required)) required @endif
            {{ $attributes ?? '' }}
        />
    </div>
</fieldset>