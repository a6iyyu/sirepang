<section class="overflow-x-auto w-full rounded-lg shadow relative">
    <table class="border-collapse cursor-default min-w-max w-full table-auto">
        <thead class="bg-green-700 text-white">
            <tr>
                @foreach ($headers as $header)
                    <th class="w-1/{{ count($headers) }} px-6 py-4 font-bold tracking-wider uppercase text-xs text-center">
                        <div class="flex items-center justify-center space-x-2 whitespace-nowrap">
                            <h5>{{ $header }}</h5>
                            @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                                <i id="sort" class="fa-solid fa-sort cursor-pointer hover:text-green-dark"></i>
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
                            <h5 class="cursor-default flex items-center justify-center space-x-3">
                                {!! $cell !!}
                            </h5>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
{{ $data->links() }}

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("#sort").forEach((sort, index) => {
                let ascending = true;

                sort.addEventListener("click", () => {
                    const tbody = document.getElementById("table-body");
                    const rows = Array.from(tbody.querySelectorAll("tr"));

                    const sorted_rows = rows.sort((a, b) => {
                        const a_text = a.querySelectorAll("td")[index].textContent.trim().toLowerCase();
                        const b_text = b.querySelectorAll("td")[index].textContent.trim().toLowerCase();
                        return ascending ? a_text.localeCompare(b_text) : b_text.localeCompare(a_text);
                    });

                    ascending = !ascending;

                    tbody.innerHTML = "";
                    sorted_rows.forEach(row => tbody.appendChild(row));
                });
            });
        });
    </script>
@endpush