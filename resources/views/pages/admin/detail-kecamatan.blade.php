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
        <a
            href="{{ route('data-kecamatan') }}"
            class="flex h-fit w-fit transform cursor-pointer items-center justify-center rounded-lg bg-emerald-600 px-4 py-3 text-sm text-white transition-all duration-300 ease-in-out lg:px-5 lg:py-3 lg:hover:bg-emerald-500"
        >
            <i class="fa-solid fa-arrow-left"></i>
            <h5 class="ml-4">Kembali</h5>
        </a>
        <h2 class="text-green-dark mt-6 cursor-default text-base font-bold lg:text-xl">Daftar Desa</h2>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic">
            Berikut adalah daftar desa yang terletak di wilayah Kecamatan {{ $kecamatan }}.
        </h5>
        <section class="mt-2 mb-8">
            @include('shared.ui.table', [
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