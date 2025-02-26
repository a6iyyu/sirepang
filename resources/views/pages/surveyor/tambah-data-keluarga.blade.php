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
            <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.pangan')
            <section class="flex justify-end space-x-4">
                @if (config('app.debug'))
                    <button
                        type="button"
                        id="debug"
                        class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-yellow-500 text-white lg:hover:bg-yellow-600"
                    >
                        <i class="fa-solid fa-bug"></i>
                        &emsp;Debug Fill
                    </button>
                @endif
                <button
                    type="submit"
                    id="submit-form"
                    class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-[#2c5e4f] text-white lg:hover:bg-green-700"
                >
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
            const submit_form = document.getElementById("submit-form");

            @if (config('app.debug'))
                document.getElementById("debug").addEventListener("click", () => {
                    const debug = {
                        'nama_kepala_keluarga': Math.random().toString(36).substring(7),
                        'id_desa': Math.floor(Math.random() * 10) + 50,
                        'alamat': Math.random().toString(36).substring(7),
                        'jumlah_keluarga': Math.floor(Math.random() * 10) + 1,
                        'range_pendapatan': '1',
                        'range_pengeluaran': '1',
                        'is_hamil': Math.floor(Math.random() * 2),
                        'is_menyusui': Math.floor(Math.random() * 2),
                        'is_balita': Math.floor(Math.random() * 2),
                    }

                    Object.keys(debug).forEach(key => {
                        const input = form.querySelector(`[name="${key}"]`);
                        if (!input) return;

                        if (input.type === 'radio') {
                            const radio = form.querySelector(`[name="${key}"][value="${debug[key]}"]`);
                            if (radio) radio.checked = true;
                            return;
                        }

                        if (input.type === 'file') return;
                        input.value = debug[key];
                        if (input.tagName.toLowerCase() === 'select') input.dispatchEvent(new Event('change', { bubbles: true }));
                    });
                });
            @endif

            form.addEventListener("submit", async e => {
                e.preventDefault();

                submit_form.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> &emsp;Mengirim...`;
                submit_form.disabled = true;

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
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        },
                    });

                    let response_text = await response.text();
                    if (response_text.trim().startsWith("<!DOCTYPE html>")) throw new Error("Server mengembalikan halaman HTML. Mungkin terjadi kesalahan pada server.");

                    const parse = JSON.parse(response_text);

                    if (parse.redirect) {
                        window.location.href = parse.redirect
                    } else if (parse.error) {
                        alert(`Error: ${parse.error}`);
                        submit_form.innerHTML = `<i class="fa-solid fa-paper-plane"></i> &emsp;Kirim`;
                        submit_form.disabled = false;
                    };
                } catch (error) {
                    console.error("[ERROR] Terjadi kesalahan saat proses mengirim: ", error);
                    submit_form.innerHTML = `<i class="fa-solid fa-paper-plane"></i> &emsp;Kirim`;
                    submit_form.disabled = false;
                }
            });
        });
    </script>
@endpush