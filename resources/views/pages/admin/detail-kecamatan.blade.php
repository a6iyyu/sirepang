@extends('layouts.main')

@section('judul')
    Detail Kecamatan {{ $kecamatan }}
@endsection

@section('deskripsi')
    Lihat data lengkap kecamatan {{ $kecamatan }}. Cek jumlah desa dan keluarga yang sudah didata di wilayah ini.
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
            style="flex w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-emerald-600 text-white lg:px-5 lg:py-3 lg:text-base lg:hover:bg-emerald-500"
        />
        <h1 class="text-green-dark mt-6 cursor-default text-xl font-bold md:text-2xl lg:text-3xl">Daftar Desa</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic lg:text-base">
            Berikut adalah daftar desa yang terletak di wilayah Kecamatan {{ $kecamatan }}.
        </h5>
        <section class="mt-2 mb-8">
            @include('shared.table.table', [
                'headers' => ['Nama Desa', 'Kode Wilayah'],
                'sortable' => ['Nama Kecamatan'],
                'rows' => $desa->map(fn ($item) => [$item->nama_desa, $item->kode_wilayah])->toArray(),
            ])
            @if ($desa->isEmpty())
                <div class="flex flex-col items-center justify-center rounded-lg py-20">
                    <i class="fa-solid fa-file mb-3 text-5xl text-gray-400"></i>
                    <h5 class="mb-1 text-lg font-medium text-gray-600">Belum ada data kecamatan</h5>
                </div>
            @endif
        </section>
    </main>
@endsection