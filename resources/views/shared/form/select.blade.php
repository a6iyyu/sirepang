
<fieldset class="flex w-full flex-col justify-between space-y-4">
    <label for="{{ $name }}" class="font-medium">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="search-select-container relative">
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            class="hidden w-full appearance-none rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 focus:ring-0 focus:outline-none"
            required
        >
            <option value="" hidden>Pilih {{ $label }}</option>
            @if (is_array($options))
                @foreach ($options as $optionValue => $optionLabel)
                    <option value="{{ $optionValue }}" {{ old($name, $selected ?? '') == $optionValue ? 'selected' : '' }}>
                        {{ $optionLabel }}
                    </option>
                @endforeach
            @endif
        </select>
        <div class="custom-select">
            <button
                type="button"
                class="select-selected flex w-full cursor-pointer items-center justify-between rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 text-left"
                onclick="toggle_dropdown('{{ $name }}', event)"
            >
                <span class="selected-text max-w-[210px] truncate">
                    @if (old($name, $selected ?? '') && is_array($options))
                        @foreach ($options as $optionValue => $optionLabel)
                            @if (old($name, $selected ?? '') == $optionValue)
                                {{ $optionLabel }}
                            @endif
                        @endforeach
                    @else
                        Pilih {{ $label }}
                    @endif
                </span>
                <i class="fa-solid fa-chevron-down ml-2 flex-shrink-0 text-xs text-gray-400"></i>
            </button>
            <ul id="dropdown-{{ $name }}" class="select-items absolute z-50 mt-1 hidden max-h-60 w-full overflow-y-auto rounded-md border-2 border-gray-700 bg-white">
                <li class="sticky top-0 border-b border-gray-200 bg-white p-2">
                    <input
                        type="text"
                        class="search-input w-full rounded-md border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none"
                        placeholder="Cari..."
                        oninput="filter_options('{{ $name }}', event)"
                    />
                    <i class="fa-solid fa-search absolute top-3 right-6 translate-y-1/2 text-gray-400"></i>
                </li>
                @if (is_array($options))
                    @foreach ($options as $optionValue => $optionLabel)
                        <li
                            role="option"
                            class="option-item {{ old($name, $selected ?? '') == $optionValue ? 'bg-gray-100' : '' }} cursor-pointer px-4 py-3 hover:bg-gray-100"
                            data-value="{{ $optionValue }}"
                            data-label="{{ $optionLabel }}"
                            onclick="select_option('{{ $name }}', '{{ $optionValue }}', this.getAttribute('data-label'))"
                        >
                            {{ $optionLabel }}
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</fieldset>

@push('skrip')
    <script>
        if (typeof window.selectSearchInitialized === 'undefined') {
            window.selectSearchInitialized = true;
            document.addEventListener('click', (e) => {
                const dropdowns = document.querySelectorAll('.select-items');
                dropdowns.forEach((dropdown) => {
                    if (!e.target.closest('.custom-select')) dropdown.classList.add('hidden');
                });
            });
        }
    </script>
@endpush