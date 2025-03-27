@extends('layouts.main')

@section('judul')
    Edit Keluarga {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
    
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <form action="{{ route('keluarga.perbarui', $keluarga->id_keluarga) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('components.surveyor.edit-data-keluarga.keluarga')
            <hr class="bg-green-dark my-6 h-0.25 text-transparent" />
            @include('components.surveyor.edit-data-keluarga.dokumentasi')
            <hr class="bg-green-dark my-6 h-0.25 text-transparent" />
            @include('components.surveyor.edit-data-keluarga.pangan')
            <section class="flex justify-end">
                <button
                    type="submit"
                    id="submit-form"
                    class="mt-6 flex h-fit transform cursor-pointer items-center rounded-lg bg-[#2c5e4f] px-5 py-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-green-700"
                >
                    <i class="fa-solid fa-paper-plane mr-4"></i>
                    Kirim
                </button>
            </section>
        </form>
    </main>
@endsection