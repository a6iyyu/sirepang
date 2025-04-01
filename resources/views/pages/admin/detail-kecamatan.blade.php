@extends('layouts.main')

@section('judul')
    Detail Kecamatan {{ $kecamatan }}
@endsection

@section('deskripsi')
    
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-3xl font-bold">Daftar Desa</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-base italic">
            Berikut adalah daftar desa yang terletak di wilayah Kecamatan {{ $kecamatan }}.
        </h5>
        <section class="mt-2 mb-8">
            @include('shared.table.table', [
                'headers' => ['Nama Kecamatan', 'Jumlah Desa'],
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