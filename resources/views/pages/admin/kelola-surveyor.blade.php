@extends('layouts.main')

@section('judul')
    Kelola Surveyor
@endsection

@section('deskripsi')
    Kelola daftar surveyor yang sudah terdaftar di SIREPANG.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.admin.kelola-surveyor.selamat-datang')
        <section class="mt-8">
            @include('shared.ui.table', [
                'headers' => ['NIP', 'Nama Surveyor', 'Kecamatan', 'Aksi'],
                'sortable' => ['Nama Surveyor', 'Kecamatan'],
                'rows' => $data->map(fn ($item) => [
                    $item->kader->nip ?? 'N/A',
                    $item->kader->nama ?? 'N/A',
                    $item->kader->kecamatan->nama_kecamatan ?? 'N/A',
                    view('components.admin.kelola-surveyor.aksi', ['item' => $item]),
                ])->toArray(),
            ])
        </section>
    </main>
@endsection