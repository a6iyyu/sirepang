@extends('layouts.main')

@section('judul')
    Rekap Pangan {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
    Informasi lengkap rekap pangan dari keluarga {{ $keluarga->nama_kepala_keluarga }} untuk mendukung rekapitulasi pangan desa.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <x-menu
            icon="fa-solid fa-arrow-left mr-2"
            label="Kembali"
            route="data-kecamatan"
            sidebar="{{ false }}"
            style="mt-4 flex w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-emerald-600 text-white lg:px-5 lg:py-3 lg:text-base lg:hover:bg-emerald-500"
        />
        <h1 class="text-green-dark mt-6 cursor-default text-xl font-bold md:text-2xl lg:text-3xl">
            Detail Rekap Pangan
        </h1>
        <h5 class="tetx-green-medium mt-1 cursor-default text-sm italic lg:text-base">
            Berikut merupakan detail rekap pangan dari keluarga {{ $keluarga->nama_kepala_keluarga }}.
        </h5>
        @include('components.admin.rekap-pangan.detail')
    </main>
@endsection