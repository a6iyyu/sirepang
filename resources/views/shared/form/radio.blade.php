<fieldset class="flex w-full flex-col justify-between space-y-4">
    <h5 class="cursor-default font-medium">
        {{ $label }} <span class="text-red-500">*</span>
    </h5>
    <div class="flex items-center space-x-6">
        @foreach ($options as $value => $text)
            <span class="inline-flex items-center cursor-pointer">
                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ $name . '_' . $value }}"
                    value="{{ $value }}"
                    class="h-4 w-4 cursor-pointer text-indigo-600 transition duration-150 ease-in-out"
                    required
                />
                <label for="{{ $name . '_' . $value }}" class="ml-2 cursor-pointer">{{ $text }}</label>
            </span>
        @endforeach
    </div>
</fieldset>