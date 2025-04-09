@extends('layouts.main')

@section('judul')
    Masuk
@endsection

@section('deskripsi')
    Masuk ke SIREPANG untuk mulai pantau dan catat data pangan keluarga di Kabupaten Malang dengan mudah dan cepat.
@endsection

@section('konten')
    <main class="relative flex min-h-screen w-full flex-grow">
        @include('components.auth.gambar')
        @include('components.auth.formulir')
    </main>
@endsection