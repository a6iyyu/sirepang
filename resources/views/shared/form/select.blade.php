<fieldset class="@if ($required) flex w-full flex-col justify-between space-y-4 @endif">
    <label for="{{ $name }}" class="font-medium">
        @if ($required)
            {{ $label }}
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        <select name="{{ $name }}" id="{{ $name }}" class="{{ $class }}" required>
            <option value="" hidden>Pilih {{ $label }}</option>
            @if (is_array($options))
                @foreach ($options as $value => $label)
                    <option value="{{ $value }}" {{ (old($name, $selected ?? '') == $value) ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            @endif
        </select>
        <span class="pointer-events-none absolute inset-y-0 right-0 hidden items-center px-5 text-xs text-gray-400 lg:flex">
            <i class="fa-solid fa-chevron-down"></i>
        </span>
    </div>
</fieldset>