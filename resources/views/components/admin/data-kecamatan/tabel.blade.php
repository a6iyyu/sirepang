<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama Kecamatan', 'Jumlah Desa', 'Aksi'],
        'sortable' => ['Nama Kecamatan'],
        'rows' => $data->map(fn ($item) => [$item->nama_kecamatan, $item->jumlah_desa, view('components.admin.data-kecamatan.aksi', ['item' => $item])->render()])->toArray(),
    ])
</section>