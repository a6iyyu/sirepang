@extends('layouts.main')

@section('judul')
    Surveyor {{ $surveyor->nama ?? 'N/A' }}
@endsection

@section('deskripsi')
    Informasi lengkap surveyor {{ $surveyor->nama ?? 'N/A' }}.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <a
            href="{{ route('kelola-surveyor') }}"
            class="flex h-fit w-fit transform cursor-pointer items-center justify-center rounded-lg bg-emerald-600 px-4 py-3 text-sm text-white transition-all duration-300 ease-in-out lg:px-5 lg:py-3 lg:hover:bg-emerald-500"
        >
            <i class="fa-solid fa-arrow-left"></i>
            <h5 class="ml-4">Kembali</h5>
        </a>
        <h1 class="text-green-dark mt-6 cursor-default text-base font-bold lg:text-xl">
            Informasi Surveyor
        </h1>
        <h5 class="tetx-green-medium mt-3 cursor-default text-sm italic">
            Berikut merupakan informasi lengkap mengenai surveyor {{ $surveyor->nama ?? 'N/A' }}.
        </h5>
        <article class="mt-8 divide-y divide-gray-200 overflow-hidden rounded-xl border border-gray-200 shadow-xl">
            <x-data name="NIP (Nomor Induk Pegawai)" :value="$surveyor->nip ?? 'N/A'" />
            <x-data name="Nama Surveyor" :value="$surveyor->nama ?? 'N/A'" />
            <x-data name="Kode Wilayah" :value="$surveyor->kecamatan->kode_wilayah ?? 'N/A'" />
            <x-data name="Kecamatan" :value="$surveyor->kecamatan->nama_kecamatan ?? 'N/A'" />
            <x-data name="Nomor Telepon" :value="$surveyor->contact_info ?? 'N/A'" />
        </article>
    </main>
@endsection