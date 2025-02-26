@props(['headers', 'rows' => [], 'sortable' => null])

<section class="overflow-x-auto whitespace-nowrap rounded-lg shadow relative">
    <table class="border-collapse table-auto w-full whitespace-normal table-striped">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th class="cursor-default">
                        <div class="flex w-full items-center justify-center space-x-2 px-6 py-4 font-bold tracking-wider uppercase text-xs @if (Request::routeIs('tambah-data')) bg-green-700 text-white @endif">
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
                        <td>
                            <div class="cursor-default flex items-center justify-center space-x-3 px-6 py-4 text-center">
                                {!! $cell !!}
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>