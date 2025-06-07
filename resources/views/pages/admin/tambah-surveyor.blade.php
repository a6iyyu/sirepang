@extends('layouts.main')

@section('judul')
    Tambah Surveyor
@endsection

@section('deskripsi')
    Tambahkan surveyor baru untuk mendata pangan keluarga di Kabupaten Malang.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h3 class="mb-6 cursor-default text-lg font-bold text-[#2c5e4f] lg:text-2xl">
            Masukkan Data Surveyor
        </h3>
        @if ($errors->any())
            <ul class="my-5 list-inside list-disc rounded-lg border border-red-500 bg-red-50 p-4 text-sm text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('kelola-surveyor.tambah') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')
            <x-input
                icon="fa-solid fa-user"
                label="Nama Surveyor"
                name="nama"
                placeholder="Cth. Habib Zaidan"
                type="text"
                :required="true"
            />
            <div class="mb-8 mt-6 grid grid-cols-1 gap-8 lg:grid-cols-2">
                <x-input
                    icon="fa-solid fa-id-card"
                    label="NIP"
                    name="nip"
                    placeholder="Cth. 1234567890123456"
                    type="number"
                    :required="true"
                />
                <x-select
                    label="Kecamatan"
                    name="id_kecamatan"
                    :options="$kecamatan"
                    :required="true"
                />
                <x-input
                    icon="fa-solid fa-phone"
                    label="Nomor HP"
                    name="contact_info"
                    placeholder="Cth. 081234567890"
                    type="number"
                    :required="true"
                />
                <x-input
                    icon="fa-solid fa-lock"
                    label="Kata Sandi"
                    name="password"
                    placeholder="Cth. 12345678"
                    :required="true"
                />
            </div>
            <section class="mt-6 flex justify-end text-sm gap-4">
                <a href="{{ route('kelola-surveyor') }}" class="flex h-fit transform cursor-pointer items-center rounded-lg bg-red-600 px-5 py-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-red-500">
                    <i class="fa-solid fa-xmark mr-4"></i> Batal
                </a>
                <button
                    type="submit"
                    id="submit-form"
                    class="flex h-fit transform cursor-pointer items-center rounded-lg bg-[#2c5e4f] px-5 py-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-green-700"
                >
                    <i class="fa-solid fa-paper-plane mr-4"></i>
                    Tambah
                </button>
            </section>
        </form>
    </main>
@endsection