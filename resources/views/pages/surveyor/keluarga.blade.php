@extends('layouts.main')

@section('judul')
    Keluarga
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.keluarga.selamat-datang')
        @include('components.surveyor.keluarga.sortir')
        @include('components.surveyor.keluarga.tabel', ['data' => $data])
    </main>
@endsection