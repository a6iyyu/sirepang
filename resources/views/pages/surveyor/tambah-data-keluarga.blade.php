@extends('layouts.main')

@section('judul')
    Tambah Data Keluarga
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <form action="{{ route('tambah-data-keluarga') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('components.surveyor.tambah-data-keluarga.keluarga')
            <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.dokumentasi')
            {{-- <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.pangan') --}}
            <section class="flex justify-end">
                <button type="submit" class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-[#2c5e4f] text-white lg:hover:bg-green-700">
                    <i class="fa-solid fa-paper-plane"></i>
                    &emsp;Kirim
                </button>
            </section>
        </form>
    </main>
@endsection

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.querySelector("form");

            form.addEventListener("submit", async e => {
                e.preventDefault();

                let form_data = new FormData(form);
                let data_pangan = [];

                document.querySelectorAll("[name='nama_pangan']").forEach((element, index) => {
                    data_pangan.push({
                        nama_pangan: element.value,
                        nama_jenis: document.querySelectorAll("[name='nama_jenis']")[index].value,
                        urt: document.querySelectorAll("[name='urt']")[index].value,
                    });
                });

                form_data.set("pangan", JSON.stringify(data_pangan));

                try {
                    let response = await fetch("{{ route('tambah-data-keluarga') }}", {
                        method: "POST",
                        body: form_data,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        },
                    });

                    if (await response.json().redirect) window.location.href = await response.json().redirect;
                } catch (error) {
                    console.error(error);
                }
            });
        });
    </script>
@endpush