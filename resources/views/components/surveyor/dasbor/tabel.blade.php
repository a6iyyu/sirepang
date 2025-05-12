@if (session('message'))
    <ul class="my-5 list-inside list-disc rounded-lg border border-red-500 bg-red-50 p-4 text-sm text-red-500">
        {{ session('message') }}
    </ul>
@endif
<section class="mt-2 mb-8">
    @include('shared.ui.table', [
        'headers' => ['Nama', 'Desa'],
        'sortable' => ['Nama', 'Desa'],
        'rows' => $data->map(fn ($item) => [$item->nama, $item->desa])->toArray(),
    ])
    @if ($data->isEmpty())
        <div class="flex flex-col items-center justify-center rounded-lg py-20 text-center">
            <i class="fa-solid fa-file mb-3 text-5xl text-gray-400"></i>
            <h5 class="mb-1 text-lg font-medium text-gray-600">Belum ada data keluarga</h5>
            <h6 class="text-sm text-gray-500">Silakan tambahkan data keluarga baru</h6>
        </div>
    @endif
    <div id="no-result" class="hidden flex-col items-center justify-center rounded-lg py-20 text-center">
        <i class="fa-solid fa-ban mb-3 text-5xl text-gray-400"></i>
        <h5 class="mb-1 text-lg font-medium text-gray-600">Ada yang keliru</h5>
        <h6 class="text-sm text-gray-500">Maaf, data yang Anda cari tidak ditemukan atau salah ketik</h6>
    </div>
</section>