@extends('layouts.main')

@section('judul')
    Dasbor
@endsection

@section('deskripsi')
    
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.dasbor.selamat-datang')
        @include('components.surveyor.dasbor.jumlah-desa-dan-keluarga')
        @include('components.surveyor.dasbor.sortir')
        @include('components.surveyor.dasbor.tabel')
    </main>
@endsection