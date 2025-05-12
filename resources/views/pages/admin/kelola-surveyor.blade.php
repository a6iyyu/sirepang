@extends('layouts.main')

@section('judul')
    Kelola Surveyor
@endsection

@section('deskripsi')
    Kelola daftar surveyor yang sudah terdaftar di SIREPANG.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <section class="flex flex-col justify-between lg:flex-row">
            <div class="text-green-dark cursor-default">
                <h2 class="text-base font-bold lg:text-xl">Kelola Surveyor</h2>
                <h5 class="mt-1 text-sm italic">
                    Daftar Surveyor yang sudah terdaftar di SIREPANG.
                </h5>
            </div>
            <a
                href="javascript:void(0)"
                class="flex mt-4 w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-green-dark text-white lg:mt-0 lg:px-5 lg:py-3 lg:hover:bg-emerald-500"
            >
                <i class="fa-solid fa-plus"></i>
                <h5 class="ml-4">Surveyor</h5>
            </a>
        </section>
        <section class="mt-8">
            @include('shared.ui.table', [
                'headers' => ['NIP', 'Nama Surveyor', 'Kecamatan', 'Aksi'],
                'sortable' => ['Nama Surveyor', 'Kecamatan'],
                'rows' => $data->map(fn ($item) => [
                    $item->kader->nip ?? 'N/A',
                    $item->kader->nama ?? 'N/A',
                    $item->kader->kecamatan->nama_kecamatan ?? 'N/A',
                    "
                        <div class=\"flex items-center justify-center gap-4\">
                            <a href=\"" . route('kelola-surveyor.detail', ['id' => $item->kader->id_kader ?? 'N/A']) . "\">
                                <i class=\"fa-solid fa-circle-info bg-blue-600 text-white p-3 rounded-lg transition-all duration-300 ease-in-out lg:hover:bg-blue-500\"></i>
                            </a>
                            <a href=\"" . route('kelola-surveyor.detail', ['id' => $item->kader->id_kader ?? 'N/A']) . "\">
                                <i class=\"fa-solid fa-pencil bg-green-600 text-white p-3 rounded-lg transition-all duration-300 ease-in-out lg:hover:bg-green-500\"></i>
                            </a>
                            <a href=\"" . route('kelola-surveyor.detail', ['id' => $item->kader->id_kader ?? 'N/A']) . "\">
                                <i class=\"fa-solid fa-trash bg-red-600 text-white p-3 rounded-lg transition-all duration-300 ease-in-out lg:hover:bg-red-500\"></i>
                            </a>
                        </div>
                    ",
                ])->toArray(),
            ])
        </section>
    </main>
@endsection