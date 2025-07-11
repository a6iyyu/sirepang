@extends('layouts.main')

@section('judul')
    Rekap PPH
@endsection

@section('deskripsi')
    Daftar rekap PPH keluarga di Kabupaten Malang. Bantu pengelolaan dan analisis ketahanan pangan melalui data yang terorganisir.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-base font-bold lg:text-xl">Rekap PPH</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic">
            Daftar rekap PPH yang diambil oleh kader tiap keluarga di Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        @include('components.admin.rekap-pph.filter')
        @include('components.admin.rekap-pph.daftar')
    </main>
@endsection