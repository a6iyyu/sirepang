@extends('layouts.main')

@section('judul')
    Edit Keluarga {{ $keluarga->nama_kepala_keluarga }}
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <form action="{{ route('keluarga.perbarui',$keluarga->id_keluarga) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('components.surveyor.edit-data-keluarga.keluarga')
            <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.edit-data-keluarga.dokumentasi')
            <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.edit-data-keluarga.pangan')
            <section class="flex justify-end">
                <button
                    type="submit"
                    id="submit-form"
                    class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-[#2c5e4f] text-white lg:hover:bg-green-700"
                >
                    <i class="fa-solid fa-paper-plane"></i>
                     Kirim
                </button>
            </section>
        </form>
    </main>
@endsection
