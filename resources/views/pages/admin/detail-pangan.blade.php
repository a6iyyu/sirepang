@extends('layouts.main')

@section('judul')
    Rekap Pangan {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
        Informasi lengkap rekap pangan dari keluarga {{ $keluarga->nama_kepala_keluarga }} untuk mendukung rekapitulasi
        pangan desa.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <a
            href="{{ route('data-kecamatan') }}"
            class="mt-4 flex h-fit w-fit transform cursor-pointer items-center justify-center rounded-lg bg-emerald-600 px-4 py-3 text-sm text-white transition-all duration-300 ease-in-out lg:px-5 lg:py-3 lg:hover:bg-emerald-500"
        >
            <i class="fa-solid fa-arrow-left mr-2"></i>
            <h5 class="ml-4">Kembali</h5>
        </a>
        <h1 class="text-green-dark mt-6 cursor-default text-base font-bold lg:text-xl">
            Detail Rekap Pangan
        </h1>
        <h5 class="tetx-green-medium mt-1 cursor-default text-sm italic">
            Berikut merupakan detail rekap pangan dari keluarga {{ $keluarga->nama_kepala_keluarga }}.
        </h5>
        @include('components.admin.rekap-pangan.detail')
    </main>
@endsection