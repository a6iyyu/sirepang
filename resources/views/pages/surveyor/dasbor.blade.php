@extends('layouts.main')

@section('judul')
    Dasbor
@endsection

@section('deskripsi')
    Pantau dan kelola data pangan keluarga di desa. Bantu wujudkan ketahanan pangan di Kabupaten Malang bersama SIREPANG.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.dasbor.selamat-datang')
        @include('components.surveyor.dasbor.jumlah-desa-dan-keluarga')
        @include('components.surveyor.dasbor.sortir')
        @include('components.surveyor.dasbor.tabel')
    </main>
@endsection

@section('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById("search-container");
            const input = document.getElementById("cari-kepala-keluarga");
            const no_result = document.getElementById("no-result");
            const search = document.getElementById("search-icon");
            const table = document.getElementById("table-body");

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
                fetch(`/dasbor/cari?q=${input.value}`).then((response) => {
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
                            <td class="px-6 py-4 text-sm text-center whitespace-nowrap">${highlight_keyword(row.nama, input.value)}</td>
                            <td class="px-6 py-4 text-sm text-center whitespace-nowrap">${highlight_keyword(row.desa, input.value)}</td>
                        `;

                        table.appendChild(tr);
                    });
                }).catch((e) => console.error(e));
            });
        });
    </script>
@endsection