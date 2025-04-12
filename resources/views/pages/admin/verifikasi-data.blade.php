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
    </main>
@endsection

@push('skrip')
    <script>
        const modal_approve = (id, action) => {
            const modal = document.getElementById('modal-konfirmasi');
            const id_modal = document.getElementById('modal-id');
            const confirm = document.getElementById('btn-confirm');

            if (confirm) {
                id_modal.innerText = `ID Keluarga: ${id}`;
                confirm.onclick = () => confirm_verification(id, action);
                modal.classList.add('flex');
                modal.classList.remove('hidden');
            }
        };

        const confirm_verification = (id, action) => {
            const csrf_token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const url = action === 'approve' ? '{{ route('verifikasi.diterima') }}' : '{{ route('verifikasi.ditolak') }}';

            fetch(url, {
                body: JSON.stringify({ id: id }),
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrf_token,
                },
            }).then((response) => response.json()).then((data) => {
                window.location.href = data.redirect;
            }).catch((error) => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memverifikasi data.');
            });
        };

        document.addEventListener('DOMContentLoaded', () => {
            const textarea = document.getElementById('komentar');
            const character_count = document.getElementById('hitung-karakter');

            if (textarea && character_count) {
                textarea.addEventListener('input', () => {
                    character_count.textContent = textarea.value.length;
                });
            }

            document.querySelectorAll('.action-button').forEach(button => {
                button.addEventListener('click', (event) => {
                    const id = event.target.getAttribute('data-id');
                    const action = event.target.getAttribute('data-action');
                    modal_approve(id, action);
                });
            });

            document.getElementById('btn-cancel')?.addEventListener('click', () => {
                document.getElementById('modal-konfirmasi').classList.add('hidden');
            });
        });
    </script>
@endpush