<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    <div class="flex items-center space-x-6">
        @foreach($options as $value => $text)
            <label class="inline-flex items-center">
                <input 
                    type="radio" 
                    name="{{ $name }}" 
                    value="{{ $value }}" 
                    class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                >
                <span class="ml-2">{{ $text }}</span>
            </label>
        @endforeach
    </div>
</div>
