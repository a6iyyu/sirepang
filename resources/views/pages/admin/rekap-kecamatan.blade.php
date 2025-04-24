@extends('layouts.main')

@section('judul')
    Rekap Kecamatan
@endsection

@section('deskripsi')
    {{-- Pantau rekap pangan dari tiap kecamatan di Kabupaten Malang. Data ini dikumpulkan oleh kader untuk mendukung analisis pangan daerah. --}}
@endsection

@section('konten')
    <main class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('latar-belakang.svg') }})">
        {{-- <h1 class="text-green-dark cursor-default text-3xl font-bold">Rekap Pangan Kecamatan x</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-base italic">
            Daftar rekap pangan yang diambil oleh kader pada tiap keluarga di Kecamatan x, Kabupaten Malang, Provinsi Jawa
            Timur.
        </h5> --}}
        <h1 class="text-green-dark cursor-default text-3xl font-bold">Rekap Pangan Kecamatan {{ $kecamatan['nama_kecamatan'] }}</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-base italic">
            Daftar rekap pangan yang diambil oleh kader pada tiap keluarga di Kecamatan {{ $kecamatan['nama_kecamatan'] }}, Kabupaten Malang, Provinsi Jawa Timur.
        </h5>

        {{-- <a href="{{route('export.rekap-kecamatan', ['th' => $th])}}">donlod excel</a> --}}

            @foreach ($th as $thn)
                <a href="{{ url('admin/data-kecamatan/rekap-kecamatan/tahun/' . $thn) }}">{{$thn}}</a> <br>
            @endforeach

    </main>
@endsection
