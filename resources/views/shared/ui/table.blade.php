<section class="relative w-full overflow-x-auto rounded-lg shadow">
    <table class="w-full min-w-max table-auto border-collapse cursor-default">
        <thead class="bg-green-medium text-white">
            <tr>
                @foreach ($headers as $header)
                    <th class="w-1/{{ count($headers) }} px-6 py-4 text-center font-bold tracking-wider uppercase">
                        <div class="flex items-center justify-center space-x-2 text-[8pt] whitespace-nowrap">
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
                <tr class="border-b text-sm transition-all duration-200">
                    @foreach ($row as $index => $cell)
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <section class="flex cursor-default items-center justify-center space-x-3 text-[10pt]">
                                {!! $cell !!}
                            </section>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@if (isset($data) && ! $data->isEmpty())
    {{ $data }}
@endif