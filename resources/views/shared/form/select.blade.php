<fieldset class="flex w-full flex-col justify-between space-y-4">
    <label for="{{ $name }}" class="font-medium">
        {{ $label }}
        @if (!empty($required))
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            required
            class="appearance-none w-full px-4 py-3 border-2 border-gray-700 rounded-md bg-transparent focus:outline-none focus:ring-2 focus:ring-gray-100"
        >
            <option value="" selected disabled>
                Pilih {{ $label }}
            </option>
            @if (is_array($options))
                @foreach ($options as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            @endif
        </select>
        <span class="pointer-events-none absolute inset-y-0 right-0 hidden items-center px-5 text-xs text-gray-400 lg:flex">
            <i class="fa-solid fa-chevron-down"></i>
        </span>
    </div>
</fieldset>