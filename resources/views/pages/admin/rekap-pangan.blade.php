@extends('layouts.main')

@section('judul')
    Rekap Pangan
@endsection

@section('deskripsi')
    Pantau rekap pangan dari tiap keluarga di Malang. Data ini dikumpulkan oleh kader untuk mendukung analisis pangan daerah.
@endsection

@section('konten')
    <main
        class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})"
    >
        <h1 class="text-green-dark cursor-default text-base font-bold lg:text-xl">Rekap Pangan</h1>
        <h5 class="text-green-medium mt-2 mb-6 cursor-default text-sm italic">
            Daftar rekap pangan yang diambil oleh kader tiap keluarga di Kabupaten Malang, Provinsi Jawa Timur.
        </h5>
        <form method="GET" action="{{ route('rekap-pangan') }}" class="my-6 grid grid-cols-1 gap-6 md:grid-cols-4">
            <x-select
                name="kecamatan"
                label="Kecamatan"
                :options="['' => 'Semua Kecamatan'] + $kecamatan"
                :value="request('kecamatan')"
                :required="false"
            />
            <x-select
                name="desa"
                label="Desa"
                :options="['' => 'Semua Desa'] + $desa"
                :value="request('desa')"
                :required="false"
            />
            <x-input
                icon="fa-solid fa-magnifying-glass"
                name="nama_kepala_keluarga"
                placeholder="Cari nama kepala keluarga..."
                type="text"
                :required="false"
                :value="request('nama_kepala_keluarga')"
            />
            <div class="flex justify-end items-end">
                <button type="submit" class="h-fit w-fit cursor-pointer rounded-md bg-green-medium px-16 py-4 text-xs font-medium text-white transition-colors duration-200 lg:text-[13px]">
                    Cari
                </button>
            </div>
        </form>
        @if ($data->isEmpty())
            <section class="flex flex-col items-center justify-center p-6 text-center text-slate-600">
                <i class="fa-solid fa-circle-exclamation mb-6 text-4xl text-yellow-500"></i>
                <h4 class="text-lg font-semibold">Belum ada data keluarga yang di data oleh kader.</h4>
            </section>
        @else
            @include('shared.ui.table', [
                'headers' => ['Kecamatan', 'Desa', 'Nama Keluarga', 'Aksi'],
                'sortable' => ['Kecamatan', 'Desa', 'Nama Keluarga'],
                'rows' => $data->map(fn ($item) => [
                    $item->kecamatan,
                    $item->desa,
                    $item->nama,
                    "
                        <a
                            href=\"" . route('detail-rekap-pangan', $item->id) . "\"
                            class=\"inline-flex cursor-pointer items-center rounded-md bg-blue-600 p-3 text-xs font-medium text-white transition-colors duration-200 hover:bg-blue-700\"
                        >
                            <i class=\"fa-solid fa-circle-info mr-3\"></i>
                            Detail
                        </a>
                    ",
                ])->toArray(),
            ])
        @endif
    </main>
@endsection

@push('skrip')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const data_desa_per_kecamatan = @json($desa_berdasarkan_kecamatan ?? []);
            
            const perbarui_opsi_desa = (id_kecamatan) => {
                const select_desa = document.querySelector('select[name="desa"]');
                const dropdown_desa = document.querySelector('#dropdown-desa');
                const teks_terpilih_desa = document.querySelector('.custom-select button[onclick*="desa"] .selected-text');
                
                if (!select_desa || !dropdown_desa || !teks_terpilih_desa) return;
                
                select_desa.innerHTML = '<option value="" hidden>Pilih Desa</option>';
                dropdown_desa.innerHTML = `
                    <li class="sticky top-0 border-b border-gray-200 bg-white p-2">
                        <input
                            type="text"
                            class="search-input w-full rounded-md border border-gray-300 px-4 py-2 focus:border-gray-500 focus:outline-none"
                            placeholder="Cari..."
                            oninput="filter_options('desa', event)"
                        />
                        <i class="fa-solid fa-search absolute top-3 right-6 translate-y-1/2 text-gray-400"></i>
                    </li>
                `;
                
                teks_terpilih_desa.textContent = 'Pilih Desa';
                
                const opsi_semua_desa = document.createElement('option');
                opsi_semua_desa.value = '';
                opsi_semua_desa.textContent = 'Semua Desa';
                select_desa.appendChild(opsi_semua_desa);
                
                const li_semua_desa = document.createElement('li');
                li_semua_desa.className = 'option-item cursor-pointer px-4 py-3 hover:bg-gray-100';
                li_semua_desa.setAttribute('data-value', '');
                li_semua_desa.setAttribute('data-label', 'Semua Desa');
                li_semua_desa.setAttribute('onclick', "select_option('desa', '', 'Semua Desa')");
                li_semua_desa.textContent = 'Semua Desa';
                dropdown_desa.appendChild(li_semua_desa);
                
                if (id_kecamatan && data_desa_per_kecamatan[id_kecamatan]) {
                    Object.entries(data_desa_per_kecamatan[id_kecamatan]).forEach(([id_desa, nama_desa]) => {
                        const opsi_desa = document.createElement('option');
                        opsi_desa.value = id_desa;
                        opsi_desa.textContent = nama_desa;
                        select_desa.appendChild(opsi_desa);
                        
                        const li_desa = document.createElement('li');
                        li_desa.className = 'option-item cursor-pointer px-4 py-3 hover:bg-gray-100';
                        li_desa.setAttribute('data-value', id_desa);
                        li_desa.setAttribute('data-label', nama_desa);
                        li_desa.setAttribute('onclick', `select_option('desa', '${id_desa}', '${nama_desa}')`);
                        li_desa.textContent = nama_desa;
                        dropdown_desa.appendChild(li_desa);
                    });
                }
            };
            
            const fungsi_asli_select_option = window.select_option;
            window.select_option = function(nama_field, nilai, label) {
                if (fungsi_asli_select_option) {
                    fungsi_asli_select_option(nama_field, nilai, label);
                } else {
                    const select_element = document.querySelector(`select[name="${nama_field}"]`);
                    const teks_terpilih = document.querySelector(`.custom-select button[onclick*="${nama_field}"] .selected-text`);
                    
                    if (select_element) select_element.value = nilai;
                    if (teks_terpilih) teks_terpilih.textContent = label;
                    
                    const dropdown = document.querySelector(`#dropdown-${nama_field}`);
                    if (dropdown) dropdown.classList.add('hidden');
                }
                
                if (nama_field === 'kecamatan') {
                    perbarui_opsi_desa(nilai);
                }
            };
            
            const select_kecamatan = document.querySelector('select[name="kecamatan"]');
            if (select_kecamatan && select_kecamatan.value) {
                perbarui_opsi_desa(select_kecamatan.value);
            }
        });

        if (typeof window.filter_options === 'undefined') {
            window.filter_options = function(nama_field, event) {
                const kata_kunci = event.target.value.toLowerCase();
                const dropdown = document.querySelector(`#dropdown-${nama_field}`);
                const daftar_opsi = dropdown.querySelectorAll('.option-item');
                
                daftar_opsi.forEach(opsi => {
                    const teks = opsi.textContent.toLowerCase();
                    if (teks.includes(kata_kunci)) {
                        opsi.style.display = 'block';
                    } else {
                        opsi.style.display = 'none';
                    }
                });
            };
        }

        if (typeof window.toggle_dropdown === 'undefined') {
            window.toggle_dropdown = function(nama_field, event) {
                event.stopPropagation();
                const dropdown = document.querySelector(`#dropdown-${nama_field}`);
                const semua_dropdown = document.querySelectorAll('.select-items');
                
                semua_dropdown.forEach(d => {
                    if (d !== dropdown) d.classList.add('hidden');
                });
                
                // Toggle dropdown yang diklik
                if (dropdown) {
                    dropdown.classList.toggle('hidden');
                }
            };
        }
    </script>
@endpush