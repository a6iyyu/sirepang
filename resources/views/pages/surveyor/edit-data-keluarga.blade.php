@extends('layouts.main')

@section('judul')
    Edit Keluarga {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
    Edit data keluarga {{ $keluarga->nama_kepala_keluarga }} yang sudah tercatat. Perbarui data pangan dengan mudah.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <form
            action="{{ route('keluarga.perbarui', ['id' => $keluarga->id_keluarga]) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            @include('components.surveyor.edit-data-keluarga.keluarga')
            <hr class="bg-green-dark my-6 h-0.25 text-transparent" />
            @include('components.surveyor.edit-data-keluarga.dokumentasi')
            <hr class="bg-green-dark my-6 h-0.25 text-transparent" />
            @include('components.surveyor.edit-data-keluarga.pangan')
            <section class="mt-6 flex justify-end text-sm gap-4">
                <a href="{{ route('keluarga') }}" class="flex h-fit transform cursor-pointer items-center rounded-lg bg-red-600 px-5 py-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-red-500">
                    <i class="fa-solid fa-xmark mr-4"></i> Batal
                </a>
                <button
                    type="submit"
                    id="submit-form"
                    class="flex h-fit transform cursor-pointer items-center rounded-lg bg-[#2c5e4f] px-5 py-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-green-700"
                >
                    <i class="fa-solid fa-paper-plane"></i>
                    &emsp;Kirim
                </button>
            </section>
        </form>
    </main>
@endsection

@section('skrip')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const formulir = document.querySelector('form');
            const tombol_kirim = document.getElementById('submit-form');

            formulir.addEventListener('submit', () => {
                if (window.daftar_pangan.length === 0) return alert('Harap tambahkan setidaknya satu item pangan ke dalam tabel sebelum mengirimkan formulir!');
                tombol_kirim.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-2"></i> Memperbarui...`;
                tombol_kirim.disabled = true;
            });
        });
    </script>
@endsection