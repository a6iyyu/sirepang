<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['nama', 'desa', 'alamat', 'anggota', 'umur', 'pangan'],
        'sortable' => ['desa', 'pangan'],
    ])
</section>