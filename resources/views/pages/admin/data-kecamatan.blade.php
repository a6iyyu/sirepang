@extends('layouts.main')

@section('judul')
    Data Kecamatan
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-3xl font-bold">Data Kecamatan</h1>
        <h5 class="cursor-default mt-1 mb-6 italic text-base text-green-medium">
            Pencatatan URT (Ukuran Rumah Tangga) tiap keluarga dalam satu kecamatan.
        </h5>
        @include('components.admin.data-kecamatan.tabel')
    </main>
@endsection