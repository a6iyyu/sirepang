<fieldset class="flex w-full flex-col justify-between space-y-4">
    <label for="{{ $name }}" class="font-medium">
        {{ $label }} <span class="text-red-500">*</span>
    </label>
    <div class="relative">
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            class="w-full appearance-none rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 focus:ring-2 focus:ring-gray-100 focus:outline-none"
            required
        >
            <option value="{{ $value }}" hidden>Pilih {{ $label }}</option>
            @if (is_array($options))
                @foreach ($options as $key => $text)
                    <option value="{{ $key }}" @if(old($name, $value) == $key) selected @endif>
                        {{ $text }}
                    </option>
                @endforeach
            @endif
        </select>
        <span class="pointer-events-none absolute inset-y-0 right-0 hidden items-center px-5 text-xs text-gray-400 lg:flex">
            <i class="fa-solid fa-chevron-down"></i>
        </span>
    </div>
</fieldset>