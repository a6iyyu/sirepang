@extends('layouts.main')

@section('judul')
    Keluarga
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.keluarga.selamat-datang')
        @include('components.surveyor.keluarga.sortir')
        @include('components.surveyor.keluarga.tabel', ['data' => $data])
    </main>
@endsection

@push('skrip')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('search-container');
            const search = document.getElementById('search-icon');
            const input = document.getElementById('cari-kepala-keluarga');
            const table = document.getElementById('table-body');

            search.addEventListener('click', () => {
                container.classList.add('flex');
                container.classList.remove('hidden');
                search.style.display = 'none';
                input.focus();
            });

            input.addEventListener('change', () => {
                fetch(`/keluarga/cari?q=${input.value}`)
                    .then((response) => {
                        if (!response.ok) throw new Error(`Status kesalahan HTTP: ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        table.innerHTML = '';
                        data.forEach(row => {
                            let tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td class="px-6 py-4 text-center whitespace-nowrap">${row.nama}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">${row.desa}</td>
                                <td class="flex items-center justify-center gap-4 px-6 py-4 text-center whitespace-nowrap">
                                    <a href="${row.detail}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium transition hover:bg-blue-700">
                                        <i class="fa-solid fa-circle-info mr-2"></i> Detail
                                    </a>
                                    <form action="${row.hapus}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium transition hover:bg-red-700">
                                            <i class="fa-solid fa-trash mr-2"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            `;

                            table.appendChild(tr);
                        });
                    })
                    .catch(e => console.error(e));
            });
        });
    </script>
@endpush