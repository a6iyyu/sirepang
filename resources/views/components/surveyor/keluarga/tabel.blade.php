<section class="mt-2 mb-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa', 'Aksi'],
        'sortable' => ['Desa'],
        'rows' => $data->map(fn($item) => [
            $item->nama,
            $item->desa,
            view('shared.form.action', ['item' => $item])->render(),
        ])->toArray(),
    ])
    @if ($data->isEmpty())
        <div class="flex flex-col items-center justify-center rounded-lg py-20">
            <i class="fa-solid fa-file mb-3 text-5xl text-gray-400"></i>
            <h5 class="text-gray-600 text-lg font-medium mb-1">Belum ada data keluarga</h5>
            <h6 class="text-gray-500 text-sm">Silakan tambahkan data keluarga baru</h6>
        </div>
    @endif
</section>