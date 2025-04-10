window.toggle_dropdown = (name, event) => {
    const dropdown = document.getElementById(`dropdown-${name}`);
    dropdown.classList.toggle('hidden');
    event.stopPropagation();
};

window.filter_options = (name, event) => {
    const input = event.target;
    const filter = input.value.toLowerCase();
    const dropdown = document.getElementById(`dropdown-${name}`);
    const options = dropdown.querySelectorAll('.option-item');

    options.forEach((option) => {
        const text = option.getAttribute('data-label').toLowerCase();
        option.style.display = text.includes(filter) ? '' : 'none';
    });
};

window.select_option = (name, value, label) => {
    const select = document.getElementById(name);
    select.value = value;

    const event = new Event('change', { bubbles: true });
    select.dispatchEvent(event);

    const container = select.closest('.search-select-container');
    const displayText = container.querySelector('.selected-text');
    displayText.textContent = label;

    const dropdown = document.getElementById(`dropdown-${name}`);
    dropdown.classList.add('hidden');
};