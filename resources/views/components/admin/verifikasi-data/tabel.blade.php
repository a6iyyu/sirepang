
@include('shared.table.table', [
    'headers' => ['Surveyor Kecamatan', 'Nama Kepala Keluarga', 'Status', 'Aksi'],
    'sortable' => ['Surveyor Kecamatan', 'Nama Kepala Keluarga'],
    'rows' => $data->map(fn ($item) => [
        $item->kader->nama,
        $item->nama_kepala_keluarga,
        '<span class="' . ($item->status === 'BELUM TERVERIFIKASI' ? 'bg-red-500 text-white' : 'bg-green-500 text-white') . ' px-3 py-1 rounded-full text-sm font-semibold">' . $item->status . '</span>',
        view('components.admin.verifikasi-data.aksi', ['item' => $item])->render()
    ])->toArray(),
])