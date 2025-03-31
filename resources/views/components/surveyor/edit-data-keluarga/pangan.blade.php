<div class="overflow-x-auto rounded shadow-lg">
    <table class="w-full border-collapse bg-transparent">
        <thead>
            <tr class="bg-green-dark">
                <th class="w-3/7 px-6 py-4 text-center font-semibold text-white">Nama Pangan</th>
                <th class="w-3/7 px-6 py-4 text-center font-semibold text-white">
                    Takaran URT
                    <span id="judul-takaran-unit" class="text-lg"></span>
                </th>
                <th class="w-1/7 px-6 py-4 text-center font-semibold text-white">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr id="baris-tabel-formulir-pangan">
                <td class="px-6 py-4">
                    <select id="pilihan-nama-pangan" class="w-full rounded-md border-2 border-gray-700 bg-white px-4 py-3 focus:ring-2 focus:ring-gray-100 focus:outline-none">
                        <option selected disabled>Pilih Nama Pangan</option>
                    </select>
                </td>
                <td class="px-6 py-4">
                    <input
                        type="number"
                        id="jumlah-urt"
                        class="w-full appearance-none rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 focus:ring-2 focus:ring-gray-100 focus:outline-none"
                        placeholder="Cth. 1"
                        min="0"
                    />
                </td>
                <td class="px-6 py-4">
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
    // DOM Elements
    const dom = {
        baris_tabel_formulir_pangan: document.getElementById('baris-tabel-formulir-pangan'),
        data_pangan_tersembunyi: document.getElementById('data-pangan-tersembunyi'),
        jumlah_urt: document.getElementById('jumlah-urt'),
        judul_takaran_unit: document.getElementById('judul-takaran-unit'),
        pilihan_nama_pangan: document.getElementById('pilihan-nama-pangan'),
        tombol_tambah: document.getElementById('tombol-tambah')
    };

    // Data from controller
    const controllerData = {
        all_nama_pangan: @json($all_nama_pangan),
        all_takaran: @json($all_takaran),
        nama_pangan: @json($nama_pangan),
        takaran: @json($takaran),
        jumlah_takaran: @json($jumlah_takaran)
    };

    // Debug log
    console.log('Controller Data:', controllerData);

    // State
    window.daftar_pangan = [];

    // Edit function
    function edit() {
        try {
            if (!dom.pilihan_nama_pangan) {
                throw new Error('Dropdown element not found');
            }

            applyDropdownStyle();
            populateDropdown();

            // Load existing family data
            if (controllerData.jumlah_takaran && Object.keys(controllerData.jumlah_takaran).length > 0) {
                Object.entries(controllerData.jumlah_takaran).forEach(([id_pangan, jumlah_urt]) => {
                    const namaPanganData = controllerData.nama_pangan[id_pangan] || { nama_pangan: 'Tidak ditemukan', id_takaran: null };
                    window.daftar_pangan.push({
                        nama_pangan: id_pangan,
                        jumlah_urt: jumlah_urt,
                        takaran: controllerData.takaran[id_pangan] || '',
                        teks_nama_pangan: namaPanganData.nama_pangan
                    });
                });
            }

            updateTable();

            dom.pilihan_nama_pangan.addEventListener('change', () => {
                const selectedOption = dom.pilihan_nama_pangan.options[dom.pilihan_nama_pangan.selectedIndex];
                const takaranValue = controllerData.all_takaran[selectedOption.dataset.takaranId] || '';
                dom.judul_takaran_unit.textContent = takaranValue ? ` (${takaranValue})` : '';
            });

            dom.tombol_tambah.addEventListener('click', update);

            return;
        } catch (error) {
            console.error('Terjadi kesalahan saat mengambil data:', error.message);
            alert('Data tidak ditemukan!');
            window.location.href = '#';
        }
    }

    // Update function
    function update() {
        try {
            if (!dom.pilihan_nama_pangan.value || !dom.jumlah_urt.value) {
                throw new Error('Semua bidang harus diisi!');
            }

            const selectedOption = dom.pilihan_nama_pangan.options[dom.pilihan_nama_pangan.selectedIndex];
            const newItem = {
                nama_pangan: dom.pilihan_nama_pangan.value,
                jumlah_urt: dom.jumlah_urt.value,
                takaran: controllerData.all_takaran[selectedOption.dataset.takaranId] || '',
                teks_nama_pangan: selectedOption.text
            };

            window.daftar_pangan.push(newItem);

            dom.pilihan_nama_pangan.selectedIndex = 0;
            dom.jumlah_urt.value = '';
            dom.judul_takaran_unit.textContent = '';

            updateTable();

            console.log('Data pangan berhasil diperbarui!');
        } catch (error) {
            console.error('Terjadi kesalahan saat memperbarui data:', error.message);
            alert('Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');
        }
    }

    // Helper: Apply dropdown style
    function applyDropdownStyle() {
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
    }

    // Helper: Populate dropdown with all nama_pangan options
    function populateDropdown() {
        while (dom.pilihan_nama_pangan.options.length > 1) {
            dom.pilihan_nama_pangan.remove(1);
        }

        if (!controllerData.all_nama_pangan || Object.keys(controllerData.all_nama_pangan).length === 0) {
            console.warn('All nama pangan data is empty or invalid');
            const option = document.createElement('option');
            option.textContent = 'Tidak ada data pangan';
            option.disabled = true;
            dom.pilihan_nama_pangan.appendChild(option);
            return;
        }

        Object.entries(controllerData.all_nama_pangan).forEach(([id, item]) => {
            const option = document.createElement('option');
            option.value = id;
            option.textContent = item.nama_pangan || 'Nama tidak tersedia';
            option.dataset.takaranId = item.id_takaran || '';
            option.dataset.takaran = controllerData.all_takaran[item.id_takaran] || '';
            dom.pilihan_nama_pangan.appendChild(option);
        });
    }

    // Helper: Update table
    function updateTable() {
        document.querySelectorAll('tr[data-baris-pangan]').forEach(row => row.remove());
        window.daftar_pangan.forEach((item, index) => {
            const row = document.createElement('tr');
            row.setAttribute('data-baris-pangan', '');
            row.classList.add('transition-colors', 'duration-150');
            row.innerHTML = `
                <td class="cursor-default px-6 py-4 text-gray-700">${item.teks_nama_pangan}</td>
                <td class="cursor-default px-6 py-4 text-gray-700">${item.jumlah_urt} ${item.takaran || ''}</td>
                <td class="flex px-6 py-4 items-center justify-center space-x-4">
                    <button type="button" data-hapus="${index}" class="cursor-pointer flex items-center justify-center px-4 py-3 bg-red-500 text-white rounded-lg transition-colors duration-150 shadow-sm hover:bg-red-600">
                        <i class="fa-solid fa-trash mr-3"></i> Hapus
                    </button>
                </td>
            `;
            dom.baris_tabel_formulir_pangan.parentNode.insertBefore(row, dom.baris_tabel_formulir_pangan);
        });

        document.querySelectorAll('button[data-hapus]').forEach(button => {
            button.addEventListener('click', () => {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    window.daftar_pangan.splice(parseInt(button.getAttribute('data-hapus')), 1);
                    updateTable();
                }
            });
        });

        dom.data_pangan_tersembunyi.innerHTML = '';
        window.daftar_pangan.forEach((item, index) => {
            const inputNama = document.createElement('input');
            inputNama.type = 'hidden';
            inputNama.name = `detail_pangan_keluarga[${index}][nama_pangan]`;
            inputNama.value = item.nama_pangan;

            const inputJumlah = document.createElement('input');
            inputJumlah.type = 'hidden';
            inputJumlah.name = `detail_pangan_keluarga[${index}][jumlah_urt]`;
            inputJumlah.value = item.jumlah_urt;

            dom.data_pangan_tersembunyi.appendChild(inputNama);
            dom.data_pangan_tersembunyi.appendChild(inputJumlah);
        });
    }

    // Execute edit function on load
    edit();
});
</script>
@endpush
