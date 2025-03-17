@extends('layouts.main')

@section('judul')
    Tambah Data Keluarga
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <form action="{{ route('keluarga.tambah') }}" method="POST" enctype="multipart/form-data" id="family-form">
            @csrf
            @include('components.surveyor.tambah-data-keluarga.keluarga')
            <hr class="bg-green-dark my-6 h-0.25 text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.dokumentasi')
            <hr class="bg-green-dark my-6 h-0.25 text-transparent" />
            @include('components.surveyor.tambah-data-keluarga.pangan')
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

@push('skrip')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('family-form');
            const submit_form = document.getElementById('submit-form');
            const hidden_inputs_container = document.getElementById('hidden-pangan-inputs');
            const image_input = document.querySelector('input[type="file"]');

            if (!window.daftar_pangan) window.daftar_pangan = [];
            const update_hidden_inputs = () => {
                hidden_inputs_container.innerHTML = '';
                window.daftar_pangan.forEach((item, index) => {
                    const jenis_pangan_input = document.createElement('input');
                    jenis_pangan_input.type = 'hidden';
                    jenis_pangan_input.name = `detail_pangan_keluarga[${index}][jenis_pangan]`;
                    jenis_pangan_input.value = item.jenis_pangan;

                    const pangan_input = document.createElement('input');
                    pangan_input.type = 'hidden';
                    pangan_input.name = `detail_pangan_keluarga[${index}][nama_pangan]`;
                    pangan_input.value = item.nama_pangan;

                    const urt_input = document.createElement('input');
                    urt_input.type = 'hidden';
                    urt_input.name = `detail_pangan_keluarga[${index}][jumlah_urt]`;
                    urt_input.value = item.urt;

                    hidden_inputs_container.appendChild(jenis_pangan_input);
                    hidden_inputs_container.appendChild(pangan_input);
                    hidden_inputs_container.appendChild(urt_input);
                });
            };

            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                update_hidden_inputs();
                if (window.daftar_pangan.length === 0) {
                    alert('Harap tambahkan setidaknya satu item pangan ke dalam tabel sebelum mengirimkan formulir!');
                    return;
                }

                if (!image_input.files.length) {
                    alert('Harap unggah gambar sebelum mengirimkan formulir!');
                    return;
                }

                submit_form.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-2"></i> Mengirim...`;
                submit_form.disabled = true;
                let form_data = new FormData(form);

                try {
                    let response = await fetch('{{ route('keluarga.tambah') }}', {
                        method: 'POST',
                        body: form_data,
                        headers: {
                            Accept: 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    });

                    let response_text = await response.text();
                    if (response_text.trim().startsWith('<!DOCTYPE html>')) throw new Error('Server mengembalikan halaman HTML, mungkin terjadi kesalahan pada server.');
                    const parse = JSON.parse(response_text);

                    if (parse.redirect) {
                        window.location.href = parse.redirect;
                    } else if (parse.error) {
                        alert(`Error: ${parse.error}`);
                        submit_form.innerHTML = `<i class="fa-solid fa-paper-plane mr-4"></i> Kirim`;
                        submit_form.disabled = false;
                    }
                } catch (error) {
                    console.error('[ERROR] Terjadi kesalahan saat proses mengirim: ', error);
                    submit_form.innerHTML = `<i class="fa-solid fa-paper-plane mr-4"></i> Kirim`;
                    submit_form.disabled = false;
                }
            });
        });
    </script>
@endpush