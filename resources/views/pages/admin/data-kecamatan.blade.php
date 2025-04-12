@extends('layouts.main')

@section('judul')
    Data Kecamatan
@endsection

@section('deskripsi')
    Lihat daftar kecamatan di Kabupaten Malang, pantau progres dan kelola data pangan per wilayah dengan mudah.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-xl font-bold md:text-2xl lg:text-3xl">Data Kecamatan</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic lg:text-base">
            Daftar kecamatan yang ada di wilayah Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        @include('components.admin.data-kecamatan.tabel')
    </main>
@endsection