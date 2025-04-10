@extends('layouts.main')

@section('judul')
    Verifikasi Data
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/img/latar-belakang.svg') }})">
        <section>
            {{-- @dd($data) --}}
            @foreach ($data as $item)
                <p>
                    <a class="text-blue-400"
                        href="{{ route('verifikasi.detail', ['id' => $item->id]) }}">{{ $item->nama }}</a>
                </p>
            @endforeach
        </section>
        {{-- <main
            class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
            style="background: url({{ asset('img/latar-belakang.svg') }})">
            <h1 class="text-green-dark cursor-default text-xl font-bold md:text-2xl lg:text-3xl">Verifikasi Data</h1>
            <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic lg:text-base">
                Daftar keluarga yang belum diverifikasi.
            </h5>
            @include('components.admin.verifikasi-data.tabel') --}}
    </main>
@endsection
