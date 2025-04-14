<div class="relative w-full overflow-x-scroll rounded shadow-lg">
    <table class="w-full min-w-[600px] table-auto border-collapse bg-transparent">
        <thead>
            <tr class="bg-green-dark">
                <th class="w-3/7 px-6 py-4 text-center font-semibold text-white">Nama Pangan</th>
                <th class="w-3/7 px-6 py-4 text-center font-semibold text-white">Takaran URT</th>
                <th class="w-1/7 px-6 py-4 text-center font-semibold text-white">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr id="baris-tabel-formulir-pangan">
                <td class="px-6 py-4 align-top">
                    <select id="pilihan-nama-pangan" class="w-full rounded-md border-2 border-gray-700 px-4 py-3 focus:ring-2 focus:ring-gray-100 focus:outline-none">
                        <option selected disabled>Pilih Nama Pangan</option>
                    </select>
                </td>
                <td class="px-6 py-4 align-top">
                    <div class="flex items-center space-x-2">
                        <input
                            type="number"
                            id="jumlah-urt"
                            class="w-full appearance-none rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 focus:ring-2 focus:ring-gray-100 focus:outline-none"
                            placeholder="Cth. 1"
                            min="0"
                        />
                        <span id="unit-takaran" class="text-gray-700"></span>
                    </div>
                    <p id="konversi-referensi" class="mt-2 text-sm text-gray-500"></p>
                </td>
                <td class="px-6 py-4 align-top">
                    <button
                        type="button"
                        id="tombol-tambah"
                        class="cursor-pointer rounded-lg bg-green-600 px-4 py-2.5 text-white shadow-sm transition-colors duration-150 hover:bg-green-700"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div id="data-pangan-tersembunyi"></div>

@push('skrip')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dom = {
                baris_tabel_formulir_pangan: document.getElementById('baris-tabel-formulir-pangan'),
                data_pangan_tersembunyi: document.getElementById('data-pangan-tersembunyi'),
                jumlah_urt: document.getElementById('jumlah-urt'),
                unit_takaran: document.getElementById('unit-takaran'),
                konversi_referensi: document.getElementById('konversi-referensi'),
                pilihan_nama_pangan: document.getElementById('pilihan-nama-pangan'),
                tombol_tambah: document.getElementById('tombol-tambah'),
            };

            console.log('unit_takaran element:', dom.unit_takaran);
            console.log('konversi_referensi element:', dom.konversi_referensi);

            const controller = {
                semua_nama_pangan: @json($semua_nama_pangan),
                semua_takaran: @json($semua_takaran),
                nama_pangan: @json($nama_pangan),
                takaran: @json($takaran),
                jumlah_takaran: @json($jumlah_takaran),
            };

            window.daftar_pangan = [];

            const shorten_unit = (unit) => {
                const unit_map = {
                    'Kilogram': 'kg',
                    'Ons': 'ons',
                    'Butir': 'butir',
                    'Liter': 'L',
                    'Gram': 'g',
                    'Potong': 'potong',
                    'Buah': 'buah',
                    'Porsi': 'porsi',
                    'Gelas': 'gelas',
                    'Mangkok Kecil': 'mangkok kecil',
                    '50 Mililiter': '50ml',
                    '250 Mililiter': '250ml',
                    '337 Gram': '337g',
                    'Bungkus': 'bungkus',
                    '2 Gram': '2g',
                    '20 Gram': '20g',
                    '100 Mililiter': '100ml',
                    '80 Gram': '80g',
                    '150 Gram': '150g',
                    'Porsi 5 Tusuk': '5 tusuk',
                    '200 Mililiter': '200ml',
                };
                return unit_map[unit] || unit;
            };

            const populate_dropdown = () => {
                while (dom.pilihan_nama_pangan.options.length > 1) dom.pilihan_nama_pangan.remove(1);

                if (!controller.semua_nama_pangan || Object.keys(controller.semua_nama_pangan).length === 0) {
                    console.warn('All nama pangan data is empty or invalid');
                    const option = document.createElement('option');
                    option.textContent = 'Tidak ada data pangan';
                    option.disabled = true;
                    dom.pilihan_nama_pangan.appendChild(option);
                    return;
                }

                Object.entries(controller.semua_nama_pangan).forEach(([id, item]) => {
                    const option = document.createElement('option');
                    option.value = id;
                    option.textContent = item.nama_pangan || 'Nama tidak tersedia';
                    option.dataset.takaran_id = item.id_takaran || '';
                    option.dataset.takaran = controller.semua_takaran[item.id_takaran] || '';
                    option.dataset.gram = item.gram || '1000.00';
                    dom.pilihan_nama_pangan.appendChild(option);
                });
            };

            const update_table = () => {
                document.querySelectorAll('tr[data-baris-pangan]').forEach((row) => row.remove());
                window.daftar_pangan.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.setAttribute('data-baris-pangan', '');
                    row.classList.add('transition-colors', 'duration-150');
                    row.innerHTML = `
                        <td class="cursor-default px-6 py-4 text-gray-700">${item.teks_nama_pangan}</td>
                        <td class="cursor-default px-6 py-4 text-gray-700">${item.jumlah_urt} ${item.takaran || ''}</td>
                        <td class="flex px-6 py-4 items-center justify-center space-x-4">
                            <button type="button" data-edit="${index}" class="cursor-pointer flex items-center justify-center px-4 py-3 bg-blue-500 text-white rounded-lg transition-colors duration-150 shadow-sm hover:bg-blue-600">
                                <i class="fa-solid fa-edit mr-3"></i> Edit
                            </button>
                            <button type="button" data-hapus="${index}" class="cursor-pointer flex items-center justify-center px-4 py-3 bg-red-500 text-white rounded-lg transition-colors duration-150 shadow-sm hover:bg-red-600">
                                <i class="fa-solid fa-trash mr-3"></i> Hapus
                            </button>
                        </td>
                    `;
                    dom.baris_tabel_formulir_pangan.parentNode.insertBefore(row, dom.baris_tabel_formulir_pangan);
                });

                document.querySelectorAll('button[data-edit]').forEach((button) => {
                    button.addEventListener('click', () => {
                        const index = parseInt(button.getAttribute('data-edit'));
                        const item = window.daftar_pangan[index];
                        dom.pilihan_nama_pangan.value = item.nama_pangan;
                        dom.jumlah_urt.value = item.jumlah_urt;
                        if (dom.unit_takaran && dom.konversi_referensi) {
                            const unit = item.takaran || '';
                            const idTakaran = parseInt(dom.pilihan_nama_pangan.options[dom.pilihan_nama_pangan.selectedIndex].dataset.takaran_id);
                            const gram = parseFloat(dom.pilihan_nama_pangan.options[dom.pilihan_nama_pangan.selectedIndex].dataset.gram);
                            dom.unit_takaran.textContent = unit ? shorten_unit(unit) : '';

                            if ([3, 6, 7, 8, 9, 10, 14, 20].includes(idTakaran)) {
                                const unitShort = shorten_unit(unit);
                                dom.konversi_referensi.textContent = `1 ${unitShort} = ${gram.toFixed(2)} gram`;
                            } else {
                                dom.konversi_referensi.textContent = '';
                            }
                        }
                        window.daftar_pangan.splice(index, 1);
                        update_table();
                    });
                });

                document.querySelectorAll('button[data-hapus]').forEach((button) => {
                    button.addEventListener('click', () => {
                        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                            window.daftar_pangan.splice(parseInt(button.getAttribute('data-hapus')), 1);
                            update_table();
                        }
                    });
                });

                dom.data_pangan_tersembunyi.innerHTML = '';
                window.daftar_pangan.forEach((item, index) => {
                    const input_nama = document.createElement('input');
                    input_nama.type = 'hidden';
                    input_nama.name = `detail_pangan_keluarga[${index}][nama_pangan]`;
                    input_nama.value = item.nama_pangan;

                    const input_jumlah = document.createElement('input');
                    input_jumlah.type = 'hidden';
                    input_jumlah.name = `detail_pangan_keluarga[${index}][jumlah_urt]`;
                    input_jumlah.value = item.jumlah_urt;

                    dom.data_pangan_tersembunyi.appendChild(input_nama);
                    dom.data_pangan_tersembunyi.appendChild(input_jumlah);
                });
            };

            const update = () => {
                try {
                    if (!dom.pilihan_nama_pangan.value || !dom.jumlah_urt.value) throw new Error('Semua bidang harus diisi!');

                    const selected_option = dom.pilihan_nama_pangan.options[dom.pilihan_nama_pangan.selectedIndex];
                    if (!selected_option) throw new Error('Tidak ada opsi yang dipilih!');

                    const takaran_id = selected_option.dataset.takaran_id || '';
                    const takaran = controller.semua_takaran[takaran_id] || '';

                    const new_item = {
                        nama_pangan: dom.pilihan_nama_pangan.value,
                        jumlah_urt: dom.jumlah_urt.value,
                        takaran: takaran,
                        teks_nama_pangan: selected_option.text || 'Nama tidak tersedia',
                    };

                    window.daftar_pangan.push(new_item);

                    dom.pilihan_nama_pangan.selectedIndex = 0;
                    dom.jumlah_urt.value = '';
                    if (dom.unit_takaran) dom.unit_takaran.textContent = '';
                    if (dom.konversi_referensi) dom.konversi_referensi.textContent = '';

                    update_table();
                } catch (error) {
                    console.error('Terjadi kesalahan saat memperbarui data:', error.message);
                    alert('Terjadi kesalahan saat memperbarui data: ' + error.message);
                }
            };

            const apply_dropdown_style = () => {
                const style = document.createElement('style');
                style.textContent = `
                    select#pilihan-nama-pangan {
                        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
                        background-position: right 0.5rem center;
                        background-repeat: no-repeat;
                        background-size: 1.5em 1.5em;
                        padding-right: 2.5rem;
                        -webkit-appearance: none;
                        -moz-appearance: none;
                        appearance: none;
                    }
                    select#pilihan-nama-pangan option {
                        padding: 8px;
                        font-size: 14px;
                    }
                `;
                document.head.appendChild(style);
            };

            const edit = () => {
                try {
                    if (!dom.pilihan_nama_pangan) throw new Error('dropdown element not found');

                    apply_dropdown_style();
                    populate_dropdown();

                    if (controller.jumlah_takaran && Object.keys(controller.jumlah_takaran).length > 0) {
                        Object.entries(controller.jumlah_takaran).forEach(([id_pangan, jumlah_urt]) => {
                            const nama_pangan_data = controller.nama_pangan[id_pangan] || {
                                nama_pangan: 'Tidak ditemukan',
                                id_takaran: null,
                            };
                            window.daftar_pangan.push({
                                nama_pangan: id_pangan,
                                jumlah_urt: jumlah_urt,
                                takaran: controller.takaran[id_pangan] || '',
                                teks_nama_pangan: nama_pangan_data.nama_pangan,
                            });
                        });
                    }

                    update_table();

                    dom.pilihan_nama_pangan.addEventListener('change', () => {
                        const selected_option = dom.pilihan_nama_pangan.options[dom.pilihan_nama_pangan.selectedIndex];
                        if (selected_option && !selected_option.disabled) {
                            const unit = selected_option.dataset.takaran || '';
                            const idTakaran = parseInt(selected_option.dataset.takaran_id);
                            const gram = parseFloat(selected_option.dataset.gram);
                            if (dom.unit_takaran) {
                                dom.unit_takaran.textContent = unit ? shorten_unit(unit) : '';
                            }
                            if (dom.konversi_referensi) {
                                if ([3, 6, 7, 8, 9, 10, 14, 20].includes(idTakaran)) {
                                    const unitShort = shorten_unit(unit);
                                    dom.konversi_referensi.textContent = `1 ${unitShort} = ${gram.toFixed(2)} gram`;
                                } else {
                                    dom.konversi_referensi.textContent = '';
                                }
                            }
                        } else {
                            if (dom.unit_takaran) dom.unit_takaran.textContent = '';
                            if (dom.konversi_referensi) dom.konversi_referensi.textContent = '';
                        }
                    });

                    return dom.tombol_tambah.addEventListener('click', update);
                } catch (error) {
                    console.error('Terjadi kesalahan saat mengambil data:', error.message);
                    alert('Data tidak ditemukan!');
                    window.location.href = '#';
                }
            };

            edit();
        });
    </script>
@endpush
