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
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <a
            href="{{ route('keluarga') }}"
            class="flex h-fit w-fit transform cursor-pointer items-center justify-center rounded-lg bg-emerald-600 px-4 py-3 text-sm text-white transition-all duration-300 ease-in-out lg:px-5 lg:py-3 lg:hover:bg-emerald-500"
        >
            <i class="fa-solid fa-arrow-left"></i>
            <h5 class="ml-4">Kembali</h5>
        </a>
        <h2 class="mt-6 cursor-default text-base font-bold lg:text-xl">Detail Data Keluarga</h2>
        <h5 class="mt-1 cursor-default text-sm italic">
            Berikut merupakan detail rekap pangan dari keluarga {{ $keluarga->nama_kepala_keluarga }}.
        </h5>
        @include('components.surveyor.keluarga.detail')
    </main>
@endsection