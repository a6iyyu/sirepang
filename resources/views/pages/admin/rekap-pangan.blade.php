@extends('layouts.main')

@section('judul')
    Rekap Pangan
@endsection

@section('deskripsi')
    
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-3xl font-bold">Rekap Pangan</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-base italic">
            Daftar rekap pangan yang diambil oleh kader tiap keluarga di Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        @include('shared.table.table', [
            'headers' => ['Nama Keluarga', 'Desa', 'Aksi'],
            'sortable' => ['Nama Keluarga', 'Desa'],
            'rows' => $data->map(fn ($item) => [$item->nama, $item->desa, view('components.admin.rekap-pangan.aksi', ['item' => $item])->render()])->toArray(),
        ])
    </main>
@endsection