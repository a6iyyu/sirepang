<section class="mt-2 mb-8">
    @if (session('success'))
        <div id="success" class="relative mb-4 rounded-lg border border-green-400 bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif
    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa', 'Status', 'Komentar', 'Aksi'],
        'sortable' => ['Nama', 'Desa'],
        'rows' => $data->map(fn ($item) => [
            $item->nama,
            $item->desa,
            '<span class="' . match ($item->status->value) {
                'MENUNGGU' => 'bg-yellow-500 text-white',
                'DITOLAK' => 'bg-red-500 text-white',
                'DITERIMA' => 'bg-green-500 text-white',
                default => 'bg-gray-300 text-gray-700',
            } . ' px-3 py-1 rounded-full text-sm font-semibold">' . $item->status->value . '</span>',
            isset($item->komentar) ? $item->komentar : '<span class="font-semibold">-</span>',
            view('components.surveyor.keluarga.aksi', ['item' => $item])->render(),
        ])->toArray(),
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