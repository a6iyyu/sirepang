@extends('layouts.main')

@section('judul')
    Rekap Pangan
@endsection

@section('deskripsi')
    Pantau rekap pangan dari tiap keluarga di Malang. Data ini dikumpulkan oleh kader untuk mendukung analisis pangan daerah.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-base font-bold lg:text-xl">Rekap Pangan</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic">
            Daftar rekap pangan yang diambil oleh kader tiap keluarga di Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        @if ($data->isEmpty())
            <section class="flex flex-col items-center justify-center p-6 text-center text-slate-600">
                <i class="fa-solid fa-circle-exclamation mb-6 text-4xl text-yellow-500"></i>
                <h4 class="text-lg font-semibold">Belum ada data keluarga yang di data oleh kader.</h4>
            </section>
        @else
            @include('shared.ui.table', [
                'headers' => ['Kecamatan', 'Desa', 'Nama Keluarga', 'Aksi'],
                'sortable' => ['Kecamatan', 'Desa', 'Nama Keluarga'],
                'rows' => $data->map(fn ($item) => [
                    $item->kecamatan,
                    $item->desa,
                    $item->nama,
                    "
                        <a
                            href=\"" . route('detail-rekap-pangan', $item->id) . "\"
                            class=\"inline-flex cursor-pointer items-center rounded-md bg-blue-600 p-3 text-xs font-medium text-white transition-colors duration-200 hover:bg-blue-700\"
                        >
                            <i class=\"fa-solid fa-circle-info mr-3\"></i>
                            Detail
                        </a>
                    ",
                ])->toArray(),
            ])
        @endif
    </main>
@endsection