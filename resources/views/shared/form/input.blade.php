<fieldset class="@if (empty($info)) space-y-4 @endif flex w-full flex-col justify-between">
    <label for="{{ $name }}" class="font-medium">
        {{ $label }}
        @if (! empty($required))
            <span class="text-red-500">*</span>
        @endif
    </label>
    @if (! empty($info))
        <h6 class="mt-1 mb-3 cursor-default text-xs text-red-500">{{ $info }}</h6>
    @endif
    <div class="relative">
        @if (! empty($icon))
            <span class="absolute inset-y-0 left-0 flex items-center pl-5 text-gray-500">
                <i class="{{ $icon }}"></i>
            </span>
        @endif
        <input
            name="{{ $name }}"
            type="{{ $type ?? 'text' }}"
            id="{{ $name }}"
            class="w-full appearance-none rounded-lg border-2 py-2.75 pr-4 pl-12 transition-all duration-200 focus:border-[#1a4167] focus:ring-2 focus:ring-[#1a4167]/20 focus:outline-none @error($name) border-red-500 @enderror"
            value="{{ $value }}"
            @if ($type === 'number') oninput="this.value = this.value.replace(/[^0-9]/g, '')" @endif
            @if (!empty($required)) required @endif
            {{ $attributes ?? '' }}
        />
    </div>
</fieldset>