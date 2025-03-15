<section class="relative w-full overflow-x-auto rounded-lg shadow">
    <table class="w-full min-w-max table-auto border-collapse cursor-default">
        <thead class="bg-green-700 text-white">
            <tr>
                @foreach ($headers as $header)
                    <th class="w-1/{{ count($headers) }} px-6 py-4 text-center text-xs font-bold tracking-wider uppercase">
                        <div class="flex items-center justify-center space-x-2 whitespace-nowrap">
                            <h5>{{ $header }}</h5>
                            @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                                <i id="sort" class="fa-solid fa-sort hover:text-green-dark cursor-pointer"></i>
                            @endif
                        </div>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($rows as $row)
                <tr class="border-b transition-all duration-200">
                    @foreach ($row as $cell)
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <h5 class="flex cursor-default items-center justify-center space-x-3">
                                {!! $cell !!}
                            </h5>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
{{ $data }}

@push('skrip')
    <script>
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
    </script>
@endpush