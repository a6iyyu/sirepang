@if (session('message'))
    <ul class="my-5 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
        {{ session('message') }}
    </ul>
@endif
<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa'],
        'sortable' => ['Nama'],
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