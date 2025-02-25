@extends('layouts.main')

@section('judul')
    Tambah Data Keluarga
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})">
        <form action="{{ route('tambah-data-keluarga') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('components.surveyor.tambah-data-keluarga.keluarga')
            <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.dokumentasi')
            {{-- <hr class="my-6 h-0.25 bg-green-dark text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.pangan') --}}
            <section class="flex justify-end space-x-4">
                @if (config('app.debug'))
                    <button type="button" id="debug-button"
                        class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-yellow-500 text-white lg:hover:bg-yellow-600">
                        <i class="fa-solid fa-bug"></i>
                        &emsp;Debug Fill
                    </button>
                @endif
                <button type="submit"
                    class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-[#2c5e4f] text-white lg:hover:bg-green-700">
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

            @if (config('app.debug'))
                document.getElementById('debug-button').addEventListener('click', () => {
                    const debugData = {
                        'nama_kepala_keluarga': Math.random().toString(36).substring(7),
                        'id_desa': Math.floor(Math.random() * 10) + 50,
                        'alamat': Math.random().toString(36).substring(7),
                        'jumlah_keluarga': Math.floor(Math.random() * 10) + 1,
                        'range_pendapatan': '1',
                        'range_pengeluaran': '1',
                        'is_hamil': Math.floor(Math.random() * 2),
                        'is_menyusui': Math.floor(Math.random() * 2),
                        'is_balita': Math.floor(Math.random() * 2),
                    };

                    Object.keys(debugData).forEach(key => {
                        const input = form.querySelector(`[name="${key}"]`);
                        if (input) {
                            if (input.type === 'radio') {
                                const radio = form.querySelector(
                                    `[name="${key}"][value="${debugData[key]}"]`
                                );
                                if (radio) radio.checked = true;
                            } else {
                                input.value = debugData[key];
                                if (input.tagName.toLowerCase() === 'select') {
                                    const event = new Event('change', {
                                        bubbles: true
                                    });
                                    input.dispatchEvent(event);
                                } else if (input.type === "file") {
                                   
                                }
                            }
                        }
                    });
                });
            @endif

            form.addEventListener("submit", async e => {
                e.preventDefault();

                console.debug("[DEBUG] Submit event triggered.");
                let form_data = new FormData(form);

                let data_pangan = [];
                document.querySelectorAll("[name='nama_pangan']").forEach((element, index) => {
                    data_pangan.push({
                        nama_pangan: element.value,
                        nama_jenis: document.querySelectorAll("[name='nama_jenis']")[
                            index].value,
                        urt: document.querySelectorAll("[name='urt']")[index].value,
                    });
                });

                form_data.set("pangan", JSON.stringify(data_pangan));

                try {
                    let response = await fetch("{{ route('tambah-data-keluarga') }}", {
                        method: "POST",
                        body: form_data,
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                            "Accept" : "application/json",

                        },
                    });

                    console.debug("[DEBUG] Response status:", response.status);

                    let responseText = await response.text();
                    console.debug("[DEBUG] Raw response text:", responseText);

                    if (responseText.trim().startsWith("<!DOCTYPE html>")) {
                        throw new Error("Server mengembalikan halaman HTML. Mungkin terjadi kesalahan pada server.");
                    }

                    try {
                        const responseData = JSON.parse(responseText);
                        console.debug("[DEBUG] Parsed Response JSON:", responseData);

                        if (responseData.redirect) {
                            console.debug("[DEBUG] Redirect ke:", responseData.redirect);
                            window.location.href = responseData.redirect;
                        } else if (responseData.error) {
                            alert(`Error: ${responseData.error}`);
                        } else {
                            alert("Data berhasil disimpan!");
                        }
                    } catch (parseError) {
                        console.error("[ERROR] JSON parsing error:", parseError);
                        console.error("[ERROR] Response content is not valid JSON. Response Text:",
                            responseText);
                    }
                } catch (error) {
                    console.error("[ERROR] Terjadi kesalahan saat proses submit:", error);
                }
            });
        });
    </script>
@endpush

