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
        <h1 class="text-green-dark cursor-default text-base font-bold lg:text-xl">
            Rekap Pangan Kecamatan {{ $kecamatan['nama_kecamatan'] }}
        </h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic">
            Daftar rekap pangan yang diambil oleh kader pada tiap keluarga di Kecamatan
            {{ $kecamatan['nama_kecamatan'] }}, Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        <section class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($tahun as $thn)
                <figure class="relative overflow-hidden rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 text-white shadow-xl transition-all duration-300 hover:shadow-2xl">
                    <div class="bg-opacity-10 absolute top-0 right-0 h-32 w-32 translate-x-16 -translate-y-16 rounded-full bg-white"></div>
                    <div class="bg-opacity-5 absolute bottom-0 left-0 h-24 w-24 -translate-x-12 translate-y-12 rounded-full bg-white"></div>
                    <figcaption class="relative z-10 cursor-default p-6 pb-4">
                        <div class="mb-4 flex items-center justify-between">
                            <i class="fa-solid fa-calendar-days text-opacity-80 text-2xl text-white"></i>
                            <span class="bg-green-dark bg-opacity-20 rounded-full px-3 py-1 text-sm font-medium text-white">
                                {{ $thn }}
                            </span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold">Rekap Tahun {{ $thn }}</h2>
                        <p class="text-opacity-80 text-justify text-sm leading-6 text-white">
                            Berikut merupakan rekap kecamatan {{ $kecamatan['nama_kecamatan'] }}.
                        </p>
                    </figcaption>
                    <section class="relative z-10 cursor-default px-6 pb-4">
                        <div class="text-opacity-90 flex items-center space-x-2 text-white">
                            <i class="fa-solid fa-map-pin text-sm"></i>
                            <span class="text-sm">Kecamatan {{ $kecamatan['nama_kecamatan'] }}</span>
                        </div>
                    </section>
                    <section class="relative z-10 p-6 pt-4 text-sm">
                        <a
                            href="{{ url("admin/data-kecamatan/rekap-kecamatan/$id/tahun/$thn") }}"
                            class="hover:bg-opacity-90 flex w-full items-center justify-center space-x-2 rounded-lg bg-white px-4 py-3 font-semibold text-emerald-600 transition-all duration-200"
                        >
                            <i class="fa-solid fa-file-excel"></i>
                            <span>Unduh Rekap</span>
                        </a>
                    </section>
                </figure>
            @endforeach
        </section>
    </main>
@endsection