document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('#sort').forEach((sort, index) => {
        let ascending = true;

        sort.addEventListener('click', () => {
            const tbody = document.getElementById('table-body');
            const rows = Array.from(tbody.querySelectorAll('tr'));

            const sorted_rows = rows.sort((a, b) => {
                const a_text = a.querySelectorAll('td')[index].textContent.trim().toLowerCase();
                const b_text = b.querySelectorAll('td')[index].textContent.trim().toLowerCase();
                return ascending ? a_text.localeCompare(b_text) : b_text.localeCompare(a_text);
            });

            ascending = !ascending;

            tbody.innerHTML = '';
            sorted_rows.forEach((row) => tbody.appendChild(row));
        });
    });
});