@if (session('message'))
    <ul class="my-5 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
        {{ session('message') }}
    </ul>
@endif
<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa'],
        'sortable' => ['Nama', 'Desa'],
        'rows' => $data->map(fn($item) => [$item->nama, $item->desa])->toArray(),
    ])
</section>