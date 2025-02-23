@props(['headers', 'rows' => [], 'sortable' => null])

<section class="overflow-x-auto whitespace-nowrap rounded-lg shadow relative">
    <table class="border-collapse table-auto w-full whitespace-normal table-striped">
        <thead>
            <tr class="flex cursor-default">
                @foreach ($headers as $header)
                    <th class="flex w-full items-center justify-center space-x-2 px-6 py-4 font-bold tracking-wider uppercase text-xs @if (Request::routeIs('tambah-data')) bg-green-700 text-white @endif">
                        <h6>{{ $header }}</h6>
                        @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                            <i onclick="" class="fa-solid fa-sort cursor-pointer hover:text-green-dark"></i>
                        @endif
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr class="flex transition-colors duration-200">
                    @foreach ($row as $cell)
                        <td class="flex w-full items-center justify-center px-6 py-4">{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>