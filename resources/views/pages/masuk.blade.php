@extends('layouts.main')

@section('judul')
    Masuk
@endsection

@section('deskripsi')
    Selamat datang!
@endsection

@section('konten')
    <main class="min-h-[120vh] w-full relative flex flex-grow xl:min-h-screen">
        @include('components.autentikasi.gambar')
        @include('components.autentikasi.formulir')
    </main>
@endsection