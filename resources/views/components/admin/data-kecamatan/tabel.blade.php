<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Kecamatan', 'Jumlah Desa', 'Aksi'],
        'sortable' => ['Nama Kecamatan'],
        'rows' => $data->map(fn ($item) => [
            $item->nama_kecamatan,
            $item->jumlah_desa,
            view('components.admin.data-kecamatan.aksi', ['item' => $item])->render(),
        ])->toArray(),
    ])
    @if ($data->isEmpty())
        <div class="flex flex-col items-center justify-center rounded-lg py-20">
            <i class="fa-solid fa-file mb-3 text-5xl text-gray-400"></i>
            <h5 class="mb-1 text-lg font-medium text-gray-600">Belum ada data kecamatan</h5>
        </div>
    @endif
</section>