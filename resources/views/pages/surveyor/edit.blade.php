@extends('layouts.main')

@section('judul')
    Edit Keluarga {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.keluarga.edit')
    </main>
@endsection