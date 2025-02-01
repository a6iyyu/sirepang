@extends('layouts.main')

@section('judul')
    Masuk
@endsection

@section('deskripsi')
    Selamat datang!
@endsection

@section('content')
    @include('components.autentikasi.gambar')
    @include('components.autentikasi.formulir')
@endsection