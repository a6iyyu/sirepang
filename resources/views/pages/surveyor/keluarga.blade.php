@extends('layouts.main')

@section('judul')
    Keluarga
@endsection

@section('deskripsi')
    Lihat daftar keluarga yang sudah dicatat di desa. Kelola data pangan dengan efisien lewat SIREPANG.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('latar-belakang.svg') }})"
    >
        @include('components.surveyor.keluarga.selamat-datang')
        @include('components.surveyor.keluarga.sortir')
        @include('components.surveyor.keluarga.tabel')
    </main>
@endsection

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById("search-container");
            const input = document.getElementById("cari-kepala-keluarga");
            const no_result = document.getElementById("no-result");
            const search = document.getElementById("search-icon");
            const table = document.getElementById("table-body");

            const render_status = (status) => {
                let warna = "";
                switch (status) {
                    case "MENUNGGU":
                        warna = "bg-yellow-500 text-white";
                        break;
                    case "DITOLAK":
                        warna = "bg-red-500 text-white";
                        break;
                    case "DITERIMA":
                        warna = "bg-green-500 text-white";
                        break;
                    default:
                        warna = "bg-gray-300 text-black";
                }

                return `<span class="${warna} px-3 py-1 rounded-full text-sm font-semibold">${status}</span>`;
            }

            const highlight_keyword = (text, keyword) => {
                if (!keyword) return text;
                const regex = new RegExp(`(${keyword})`, "gi");
                return text.replace(regex, '<span class="!bg-orange-300 text-white rounded">$1</span>');
            }

            search.addEventListener("click", () => {
                container.classList.add("flex");
                container.classList.remove("hidden");
                search.style.display = "none";
                input.focus();
            });

            input.addEventListener("input", () => {
                fetch(`/keluarga/cari?q=${input.value}`).then((response) => {
                    if (!response.ok) throw new Error(`Status kesalahan HTTP: ${response.status}`);
                    return response.json();
                }).then((data) => {
                    const rows = Array.isArray(data) ? data : data.data;
                    table.innerHTML = "";

                    if (!rows || rows.length === 0) {
                        table.innerHTML = "";
                        no_result.classList.remove("hidden");
                        no_result.classList.add("flex");
                        return;
                    } else {
                        no_result.classList.add("hidden");
                        no_result.classList.remove("flex");
                    }

                    rows.forEach((row) => {
                        let tr = document.createElement("tr");
                        tr.innerHTML = `
                            <td class="px-6 py-4 text-center whitespace-nowrap">${highlight_keyword(row.nama, input.value)}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">${highlight_keyword(row.desa, input.value)}</td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">${render_status(row.status)}</td>
                            <td class="flex items-center justify-center gap-4 px-6 py-4 text-center whitespace-nowrap">
                                <a href="${row.detail}" class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700">
                                    <i class="fa-solid fa-circle-info mr-2"></i> Detail
                                </a>
                                <a href="${row.edit}" class="inline-flex cursor-pointer items-center rounded-md bg-yellow-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-yellow-700">
                                    <i class="fa-solid fa-pencil mr-2"></i> Edit
                                </a>
                                <form action="${row.hapus}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="inline-flex cursor-pointer items-center rounded-md bg-red-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-red-700">
                                        <i class="fa-solid fa-trash mr-2"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        `;

                        table.appendChild(tr);
                    });
                }).catch((e) => console.error(e));
            });
        });
    </script>
@endpush