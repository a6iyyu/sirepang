@extends('layouts.main')

@section('judul')
    Verifikasi Data
@endsection

@section('deskripsi')
    Tinjau kembali data keluarga yang belum terverifikasi. Pastikan setiap data pangan tercatat dengan akurat untuk mendukung ketahanan pangan Kabupaten Malang.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-xl font-bold md:text-2xl lg:text-3xl">Verifikasi Data</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic lg:text-base">
            Daftar keluarga yang belum diverifikasi.
        </h5>
        @include('components.admin.verifikasi-data.tabel')
        @include('components.admin.verifikasi-data.komentar')
    </main>
@endsection

@push('skrip')
    <script>
        const modal_approve = (id, nama, desa, kecamatan, status) => {
            const modal = document.getElementById('modal-konfirmasi');
            const id_modal = document.getElementById('modal-id');
            const confirm = document.getElementById('btn-confirm');

            if (confirm) {
                confirm.onclick = () => confirm_verification(id, nama, status);
                modal.classList.add('flex');
                modal.classList.remove('hidden');
                id_modal.innerHTML = `
                    <div class="flex justify-between gap-2">
                        <span class="font-semibold">ID Keluarga:</span>
                        <span>${id}</span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="font-semibold">Nama Keluarga:</span>
                        <span>${nama}</span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="font-semibold">Desa:</span>
                        <span>${desa}</span>
                    </div>
                    <div class="flex justify-between gap-2">
                        <span class="font-semibold">Kecamatan:</span>
                        <span>${kecamatan}</span>
                    </div>
                `;
            }
        };

        const confirm_verification = (id, nama, status) => {
            const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const kesalahan = document.getElementById('kesalahan');
            const komentar = document.getElementById('komentar').value;
            const url = `{{ route('verifikasi.status', ['status' => ':status']) }}`.replace(':status', status);

            fetch(url, {
                body: JSON.stringify({ id: id, nama: nama, komentar: komentar }),
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf_token,
                },
            }).then(async (response) => {
                const data = await response.json();
                if (!response.ok) throw new Error(data?.message || 'Terjadi kesalahan internal.');
                return data;
            }).then((data) => {
                if (data.error) {
                    kesalahan.textContent = data.error;
                    kesalahan.classList.remove('hidden');
                } else {
                    window.location.href = data.redirect;
                }
            }).catch((error) => {
                kesalahan.textContent = 'Bidang komentar perlu diisi.';
                kesalahan.classList.remove('hidden');
            });
        };

        document.addEventListener('DOMContentLoaded', () => {
            const textarea = document.getElementById('komentar');
            const character_count = document.getElementById('hitung-karakter');

            if (textarea && character_count) {
                textarea.addEventListener('input', () => character_count.textContent = textarea.value.length);
            }

            document.querySelectorAll('.action-button').forEach((button) => {
                const id = button.getAttribute('data-id');
                const nama = button.getAttribute('data-nama');
                const desa = button.getAttribute('data-desa');
                const kecamatan = button.getAttribute('data-kecamatan');
                const status = button.getAttribute('data-status');

                button.addEventListener('click', () => {
                    modal_approve(id, nama, desa, kecamatan, status);
                });
            });

            document.getElementById('btn-cancel')?.addEventListener('click', () => {
                document.getElementById('modal-konfirmasi').classList.add('hidden');
                document.getElementById('kesalahan').classList.add('hidden');
            });
        });
    </script>
@endpush