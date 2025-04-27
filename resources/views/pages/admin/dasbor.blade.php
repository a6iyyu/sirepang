@extends('layouts.main')

@section('judul')
    Dasbor
@endsection

@section('deskripsi')
    Pantau jumlah kecamatan, desa, dan keluarga terverifikasi di Kabupaten Malang. Dasbor admin bantu visualisasi data pangan Malang secara menyeluruh.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.admin.dasbor.selamat-datang')
        @include('components.admin.dasbor.jumlah-kecamatan-keluarga-dan-desa')
        @include('components.admin.dasbor.grafik-data-kecamatan')
    </main>
@endsection