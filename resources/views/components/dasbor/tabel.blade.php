<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['nama', 'desa', 'alamat', 'anggota', 'status', 'Fisiologi' , 'pangan', ],
        'sortable' => ['desa', 'pangan'],
    ])
</section>