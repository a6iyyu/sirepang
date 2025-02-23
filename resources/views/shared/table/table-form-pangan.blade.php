@props(['headers', 'rows' => [], 'sortable' => null])

<section class="overflow-x-auto rounded-lg shadow relative">
    <table class="border-collapse table-auto w-full whitespace-normal table-striped">
        <thead>
            <tr class="cursor-default">
                @foreach ($headers as $header)
                    <th class="w-1/4 px-6 py-3 font-bold tracking-wider uppercase text-xs text-gray-600 text-left">
                        {{ $header }}
                        @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                            <i onclick="" class="fa-solid fa-sort cursor-pointer text-green-dark/50 hover:text-green-dark ml-2"></i>
                        @endif
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr class="hover:bg-green-light/30 transition-colors duration-200">
                    @foreach ($row as $cell)
                        <td class="w-1/4 px-6 py-4">{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
