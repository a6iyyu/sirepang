@extends('layouts.main')

@section('judul')
    Keluarga
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.keluarga.selamat-datang')
        @include('components.surveyor.keluarga.sortir')
        @include('components.surveyor.keluarga.tabel', ['data' => $data])
        @include('shared.form.modal', [
            'title' => 'Detail Keluarga',
            'content' => view('components.surveyor.keluarga.detail', ['keluarga' => $keluarga])
        ])
    </main>
@endsection

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const detail_keluarga = document.querySelectorAll("#detail-keluarga");
            const modal_detail_keluarga = document.getElementById("modal-detail-keluarga");

            if (detail_keluarga && modal_detail_keluarga) {
                detail_keluarga.forEach((button) => {
                    button.addEventListener("click", event => {
                        modal_detail_keluarga.classList.add("flex");
                        modal_detail_keluarga.classList.remove("hidden");
                        history.pushState(null, "", `/keluarga/${event.currentTarget.getAttribute("data-id")}`);
                    });
                });
            }

            document.querySelectorAll("#keluar-detail-keluarga").forEach(element => element.addEventListener("click", () => {
                modal_detail_keluarga.classList.add("hidden");
                modal_detail_keluarga.classList.remove("flex");
                history.pushState(null, "", `/keluarga`);
            }));
        });
    </script>
@endpush