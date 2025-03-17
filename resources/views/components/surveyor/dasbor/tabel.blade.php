@if (session('message'))
    <ul class="my-5 list-inside list-disc rounded-lg border border-red-500 bg-red-50 p-4 text-sm text-red-500">
        {{ session('message') }}
    </ul>
@endif
<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa'],
        'sortable' => ['Nama', 'Desa'],
        'rows' => $data->map(fn ($item) => [$item->nama, $item->desa])->toArray(),
    ])
</section>