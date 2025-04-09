@extends('layouts.main')

@section('judul')
    Tambah Data Keluarga
@endsection

@section('deskripsi')
    Tambahkan data keluarga baru dari desa. Masukkan data dengan mudah untuk bantu rekap pangan desa secara menyeluruh.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('latar-belakang.svg') }})"
    >
        <form action="{{ route('keluarga.tambah') }}" method="POST" enctype="multipart/form-data">
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
            const data_pangan_tersembunyi = document.getElementById('data-pangan-tersembunyi');
            const formulir = document.querySelector('form');
            const gambar = document.querySelector('input[type="file"]');
            const tombol_kirim = document.getElementById('submit-form');
            let sudah_diisi = false, formulir_dikirim = false;

            formulir.addEventListener('input', () => (sudah_diisi = true));

            window.addEventListener('beforeunload', (e) => {
                if (sudah_diisi && !formulir_dikirim) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            formulir.addEventListener('submit', async (e) => {
                e.preventDefault();

                for (let isian of formulir.querySelectorAll('input, select, textarea')) {
                    if (['pilihan-nama-pangan', 'jumlah-urt'].includes(isian.id)) continue;
                    if (!isian.name && !isian.id) continue;
                    if (!isian.value || isian.value.trim() === '') {
                        alert(`Anda harus melengkapi formulir sebelum mengirimkan! (Cek bagian "${isian.name || isian.id || '[tidak diketahui]'}")`);
                        return;
                    }
                }

                if (window.daftar_pangan.length === 0) {
                    alert('Harap tambahkan setidaknya satu item pangan ke dalam tabel sebelum mengirimkan formulir!');
                    return;
                }

                if (!gambar.files.length) {
                    alert('Harap unggah gambar sebelum mengirimkan formulir!');
                    return;
                }

                let sudah_diisi = false;
                formulir.addEventListener('input', () => (sudah_diisi = true));

                window.addEventListener('beforeunload', (e) => {
                    if (sudah_diisi) {
                        e.preventDefault();
                        e.returnValue = '';
                    }
                });

                try {
                    tombol_kirim.disabled = true;
                    tombol_kirim.innerHTML = `<i class="fa-solid fa-spinner fa-spin mr-4"></i> Mengirim...`;

                    let response = await fetch('{{ route('keluarga.tambah') }}', {
                        method: 'POST',
                        body: new FormData(formulir),
                        headers: {
                            Accept: 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    });

                    let response_text = await response.text();
                    if (response_text.trim().startsWith('<!DOCTYPE html>')) throw new Error('Server mengembalikan halaman HTML, mungkin terjadi kesalahan pada server.');
                    const parse = JSON.parse(response_text);

                    if (parse.redirect) {
                        formulir_dikirim = true;
                        window.location.href = parse.redirect;
                    } else if (parse.error) {
                        alert(`Error: ${parse.error}`);
                        tombol_kirim.innerHTML = `<i class="fa-solid fa-paper-plane mr-4"></i> Kirim`;
                        tombol_kirim.disabled = false;
                    }
                } catch (error) {
                    console.error('[ERROR] Terjadi kesalahan saat proses mengirim: ', error);
                    tombol_kirim.innerHTML = `<i class="fa-solid fa-paper-plane mr-4"></i> Kirim`;
                    tombol_kirim.disabled = false;
                }
            });
        });
    </script>
@endpush