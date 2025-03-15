<fieldset class="flex w-full flex-col justify-between space-y-4">
    <h5 class="cursor-default font-medium">
        {{ $label }} <span class="text-red-500">*</span>
    </h5>
    <div class="flex items-center space-x-6">
        @foreach ($options as $key => $text)
            <span class="inline-flex cursor-pointer items-center">
                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ $name . '_' . $key }}"
                    value="{{ $key }}"
                    class="h-4 w-4 cursor-pointer text-indigo-600 transition duration-150 ease-in-out"
                    required
                    @if(old($name, $value) === $key) checked @endif
                />
                <label for="{{ $name . '_' . $key }}" class="ml-2 cursor-pointer">{{ $text }}</label>
            </span>
        @endforeach
    </div>
</fieldset>