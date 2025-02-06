@extends('layouts.main')

@section('judul')
    Dasbor
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main class="min-h-screen h-full px-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88" style="background: url({{ asset('img/latar-belakang.svg') }})">
        @include('components.keluarga.data-keluarga')
        @include('components.dasbor.sortir')
        @include('components.dasbor.tabel-data-keluarga')
    </main>
@endsection
