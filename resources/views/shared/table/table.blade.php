<section class="overflow-x-auto w-full rounded-lg shadow relative">
    <table class="border-collapse cursor-default min-w-max w-full table-auto">
        <thead class="bg-green-700 text-white">
            <tr>
                @foreach ($headers as $header)
                    <th class="w-1/{{ count($headers) }} px-6 py-4 font-bold tracking-wider uppercase text-xs text-center">
                        <div class="flex items-center justify-center space-x-2 whitespace-nowrap">
                            <h6>{{ $header }}</h6>
                            @if (in_array(strtolower($header), array_map('strtolower', $sortable)))
                                <i onclick="" class="fa-solid fa-sort cursor-pointer hover:text-green-dark"></i>
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