@extends('layouts.main')

@section('judul')
    Dasbor
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main
        class="min-h-screen h-full p-10 bg-center bg-cover bg-no-repeat transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        @include('components.surveyor.dasbor.selamat-datang')
        @include('components.surveyor.dasbor.jumlah-desa-dan-keluarga')
        @include('components.surveyor.dasbor.sortir')
        @include('components.surveyor.dasbor.tabel')
    </main>
@endsection

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const container = document.getElementById("search-container");
            const search = document.getElementById("search-icon");
            const input = document.getElementById("cari-kepala-keluarga");
            const table = document.getElementById("table-body");

            search.addEventListener("click", () => {
                container.classList.add("flex");
                container.classList.remove("hidden");
                search.style.display = "none";
                input.focus();
            });

            input.addEventListener("change", () => {
                fetch(`/dasbor/cari?q=${input.value}`)
                    .then(response => {
                        if (!response.ok) throw new Error(`Status kesalahan HTTP: ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        table.innerHTML = "";
                        data.forEach(row => {
                            let tr = document.createElement("tr");
                            tr.innerHTML = `
                                <td class="px-6 py-4 text-center whitespace-nowrap">${row.nama}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">${row.desa}</td>
                            `;

                            table.appendChild(tr);
                        });
                    })
                    .catch(e => console.error(e));
            });
        });
    </script>
@endpush