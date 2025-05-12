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
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-3xl font-bold">
            Rekap Pangan Kecamatan {{ $kecamatan['nama_kecamatan'] }}
        </h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-base italic">
            Daftar rekap pangan yang diambil oleh kader pada tiap keluarga di Kecamatan
            {{ $kecamatan['nama_kecamatan'] }}, Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        @foreach ($tahun as $thn)
            <div class="bg-green-dark mt-10 flex h-auto w-96 flex-col items-start rounded-xl border-2 border-white p-6 text-white shadow-lg transition-shadow duration-300 hover:shadow-2xl lg:mr-10">
                <h2 class="mb-4 text-2xl font-bold">Rekap {{ $thn }}</h2>
                <a
                    href="{{ url("admin/data-kecamatan/rekap-kecamatan/$id/tahun/$thn") }}"
                    class="bg-primary text-primary my-1 w-full transform rounded-md px-4 py-2 text-center text-lg font-semibold transition-all duration-200 hover:scale-105 hover:bg-green-600"
                >
                    <i class="fa-solid fa-file-excel mr-2"></i>
                    Unduh
                </a>
            </div>
        @endforeach
    </main>
@endsection