<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama', 'Alamat', 'Desa', 'Kecamatan', 'Kode Pos', 'Aksi'],
        'sortable' => ['Nama', 'Desa', 'Kecamatan'],
        'rows' => $data->map(fn ($item) => [$item->nama, $item->alamat, $item->desa, $item->kecamatan, '', view('shared.form.action', ['item' => $item])->render()])->toArray(),
    ])
</section>