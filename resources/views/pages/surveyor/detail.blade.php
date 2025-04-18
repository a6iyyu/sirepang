@extends('layouts.main')

@section('judul')
    Detail Keluarga {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
    Lihat detail data pangan keluarga {{ $keluarga->nama_kepala_keluarga }} di desa {{ $keluarga->desa->nama_desa }}.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('latar-belakang.svg') }})"
    >
        <x-menu
            icon="fa-solid fa-arrow-left mr-2"
            label="Kembali"
            route="keluarga"
            sidebar="{{ false }}"
            style="flex w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-emerald-600 text-white lg:px-5 lg:py-3 lg:text-base lg:hover:bg-emerald-500"
        />
        <h2 class="mt-6 cursor-default text-xl font-bold md:text-2xl lg:text-3xl">Detail Data Keluarga</h2>
        <h5 class="mt-1 cursor-default text-sm italic lg:text-base">
            Berikut merupakan detail rekap pangan dari keluarga {{ $keluarga->nama_kepala_keluarga }}.
        </h5>
        @include('components.surveyor.keluarga.detail')
    </main>
@endsection