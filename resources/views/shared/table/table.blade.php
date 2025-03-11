@props(['headers', 'rows' => [], 'sortable' => null])

<section class="overflow-x-auto whitespace-nowrap rounded-lg shadow relative">
    <table class="border-collapse cursor-default w-full table-fixed">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th class="w-1/{{ count($headers) }} px-6 py-4 font-bold tracking-wider uppercase text-xs text-center @if (Request::routeIs('tambah-data')) bg-green-700 text-white @endif">
                        <div class="flex items-center justify-center space-x-2">
                            <h6>{{ $header }}</h6>
                            @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                                <i onclick="" class="fa-solid fa-sort cursor-pointer hover:text-green-dark"></i>
                            @endif
                        </div>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr class="border-b transition-all duration-200">
                    @foreach ($row as $cell)
                        <td class="w-1/{{ count($headers) }} px-6 py-4 text-center">
                            <div class="cursor-default flex items-center justify-center space-x-3">
                                {!! $cell !!}
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>