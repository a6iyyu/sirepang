@extends('layouts.main')

@section('judul')
    Detail Keluarga {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
    
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.keluarga.detail')
    </main>
@endsection