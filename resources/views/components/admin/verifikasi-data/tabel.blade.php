@if ($data->isEmpty())
    <section class="flex flex-col items-center justify-center p-6 text-center text-slate-600">
        <i class="fa-solid fa-circle-exclamation mb-6 text-4xl text-yellow-500"></i>
        <h4 class="text-lg font-semibold">Belum ada data keluarga yang terverifikasi.</h4>
    </section>
@else
    @include('shared.table.table', [
        'headers' => ['Surveyor Kecamatan', 'Nama Kepala Keluarga', 'Status', 'Aksi'],
        'sortable' => ['Surveyor Kecamatan', 'Nama Kepala Keluarga'],
        'rows' => $data->map(fn ($item) => [
            $item->kader,
            $item->nama,
            '<span class="' . match ($item->status->value) {
                'MENUNGGU' => 'bg-yellow-500 text-white',
                'DITOLAK' => 'bg-red-500 text-white',
                'DITERIMA' => 'bg-green-500 text-white',
            } . ' px-3 py-1 rounded-full text-sm font-semibold">' . $item->status->value . '</span>',
            view('components.admin.verifikasi-data.aksi', ['item' => $item])->render(),
        ])->toArray(),
    ])
@endif