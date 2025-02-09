<div>
    <label for="{{ $name }}" class="block text-sm font-semibold mt-1 mb-1">{{ $label }} <span class="text-red-500">*</span></label>
    <div class="relative">
        <select 
            name="{{ $name }}" 
            id="{{ $name }}" 
            required 
            class="appearance-none w-full px-4 py-3 border-2 border-gray-700 rounded-md bg-transparent text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-100 mt-2.5"
        >
            <option value="" selected disabled>Pilih {{ $label }}</option>
            @if(is_array($options))
                @foreach($options as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            @endif
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 mt-3 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </div>
    </div>
</div>
