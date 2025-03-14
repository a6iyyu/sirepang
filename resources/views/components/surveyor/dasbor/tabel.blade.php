<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa'],
        'sortable' => ['Desa'],
        'rows' => $data->map(fn($item) => [$item->nama, $item->desa])->toArray(),
    ])
    @if (isset($data) && is_array($data) && count($data) > 0)
        <tr>
            <th>Nama</th>
            <th>Desa</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->desa }}</td>
            </tr>
        @endforeach
    @endif
</section>