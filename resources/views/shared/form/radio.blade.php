@props([
    'name',
    'label',
    'options' => [],
    'value' => null,
    'required' => false,
])

<fieldset class="flex w-full flex-col justify-between space-y-4">
    <h5 class="font-medium">
        {{ $label }}
        @if (! empty($required))
            <span class="text-red-500">*</span>
        @endif
    </h5>
    <div class="flex items-center space-x-6">
        @foreach ($options as $optionValue => $text)
            <span class="inline-flex cursor-pointer items-center">
                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ $name . '_' . $optionValue }}"
                    value="{{ $optionValue }}"
                    class="h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                    {{ $value === $optionValue ? 'checked' : '' }}
                />
                <label for="{{ $name . '_' . $optionValue }}" class="ml-2 cursor-pointer">{{ $text }}</label>
            </span>
        @endforeach
    </div>
</fieldset>
