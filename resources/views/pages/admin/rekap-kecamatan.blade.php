@extends('layouts.main')

@section('judul')
    Rekap Kecamatan
@endsection

@section('deskripsi')
    Pantau rekap pangan dari tiap kecamatan di Kabupaten Malang. Data ini dikumpulkan oleh kader untuk mendukung analisis pangan daerah.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-3xl font-bold">
            Rekap Pangan Kecamatan {{ $kecamatan['nama_kecamatan'] }}
        </h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-base italic">
            Daftar rekap pangan yang diambil oleh kader pada tiap keluarga di Kecamatan
            {{ $kecamatan['nama_kecamatan'] }}, Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        <div class=" mt-10 flex flex-col items-start w-96 h-auto p-6 rounded-xl shadow-lg bg-green-dark border-2 border-white text-white hover:shadow-2xl transition-shadow duration-300 lg:mr-10">
            @foreach ($tahun as $thn)
            <h2 class="text-2xl font-bold mb-4">Rekap {{ $thn }}</h2>
            <a href="{{ url('admin/data-kecamatan/rekap-kecamatan/tahun/' . $thn) }}"
               class="bg-primary text-primary text-lg font-semibold hover:bg-green-600 hover:scale-105 transform transition-all duration-200 rounded-md px-4 py-2 my-1 w-full text-center">
                <i class="fa-solid fa-file-excel mr-2"></i>
            Unduh
            </a>
            @endforeach
    </main>
@endsection
