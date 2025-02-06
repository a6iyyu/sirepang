@props(['headers', 'rows' => [], 'sortable' => null])

<section class="overflow-x-auto rounded-lg shadow relative">
    <table class="border-collapse table-auto w-full whitespace-no-wrap table-striped">
        <thead>
            <tr class="flex cursor-default text-left">
                @foreach ($headers as $header)
                    <th class="w-full flex items-center justify-center space-x-2 px-6 py-3 font-bold tracking-wider uppercase text-xs text-gray-600">
                        <span>{{ $header }}</span>
                        @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                            <i onclick="" class="fa-solid fa-sort cursor-pointer text-green-dark/50 hover:text-green-dark"></i>
                        @endif
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr class="hover:bg-green-light/30 transition-colors duration-200">
                    @foreach ($row as $cell)
                        <td class="px-6 py-4 text-green-medium">{{ $cell }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>