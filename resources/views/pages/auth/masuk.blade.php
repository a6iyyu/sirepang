@extends('layouts.main')

@section('judul')
    Masuk
@endsection

@section('deskripsi')
    Selamat datang!
@endsection

@section('konten')
    <main class="relative flex min-h-screen w-full flex-grow">
        @include('components.auth.gambar')
        @include('components.auth.formulir')
    </main>
@endsection