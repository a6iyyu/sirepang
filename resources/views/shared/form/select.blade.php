<fieldset class="flex w-full flex-col justify-between space-y-4">
    <label for="{{ $name }}" class="font-medium">
        {{ $label }}
        @if ($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <div class="relative">
        <div class="search-select-container relative">
            <select name="{{ $name }}" id="{{ $name }}" class="{{ $class }} hidden" required>
                <option value="" hidden>Pilih {{ $label }}</option>
                @if (is_array($options))
                    @foreach ($options as $optionValue => $optionLabel)
                        <option value="{{ $optionValue }}" {{ (old($name, $selected ?? '') == $optionValue) ? 'selected' : '' }}>
                            {{ $optionLabel }}
                        </option>
                    @endforeach
                @endif
            </select>
            <div class="custom-select w-full">
                <div
                    class="select-selected flex items-center justify-between w-full appearance-none rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 cursor-pointer"
                    onclick="toggleDropdown('{{ $name }}')"
                >
                    <span class="selected-text">
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
                    <i class="fa-solid fa-chevron-down text-gray-400 text-xs"></i>
                </div>
                <div id="dropdown-{{ $name }}" class="select-items absolute z-50 hidden w-full rounded-md border-2 border-gray-700 bg-white mt-1 max-h-60 overflow-y-auto">
                    <div class="sticky top-0 bg-white p-2 border-b border-gray-200">
                        <div class="relative">
                            <input
                                type="text"
                                class="search-input w-full rounded-md border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none"
                                placeholder="Cari..."
                                oninput="filterOptions('{{ $name }}')"
                            >
                            <i class="fa-solid fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="options-container">
                        @if (is_array($options))
                            @foreach ($options as $optionValue => $optionLabel)
                                <div
                                    class="option-item px-4 py-3 cursor-pointer hover:bg-gray-100 {{ (old($name, $selected ?? '') == $optionValue) ? 'bg-gray-100' : '' }}"
                                    data-value="{{ $optionValue }}"
                                    data-label="{{ $optionLabel }}"
                                    onclick="selectOption('{{ $name }}', '{{ $optionValue }}', this.getAttribute('data-label'))"
                                >
                                    {{ $optionLabel }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<script>
if (typeof window.selectSearchInitialized === 'undefined') {
    window.selectSearchInitialized = true;

    document.addEventListener('click', function(e) {
        const dropdowns = document.querySelectorAll('.select-items');
        dropdowns.forEach(dropdown => {
            if (!e.target.closest('.custom-select')) {
                dropdown.classList.add('hidden');
            }
        });
    });
}

function toggleDropdown(name) {
    const dropdown = document.getElementById(`dropdown-${name}`);
    dropdown.classList.toggle('hidden');
    event.stopPropagation();
}
function filterOptions(name) {
    const input = event.target;
    const filter = input.value.toLowerCase();
    const dropdown = document.getElementById(`dropdown-${name}`);
    const options = dropdown.querySelectorAll('.option-item');

    options.forEach(option => {
        const text = option.getAttribute('data-label').toLowerCase();
        if (text.indexOf(filter) > -1) {
            option.style.display = "";
        } else {
            option.style.display = "none";
        }
    });
}

function selectOption(name, value, label) {
    const select = document.getElementById(name);
    select.value = value;

    const event = new Event('change', { bubbles: true });
    select.dispatchEvent(event);

    const container = select.closest('.search-select-container');
    const displayText = container.querySelector('.selected-text');
    displayText.textContent = label;

    const dropdown = document.getElementById(`dropdown-${name}`);
    dropdown.classList.add('hidden');
}
</script>
