document.addEventListener('DOMContentLoaded', () => {
    const controller = window.controller;

    const dom = {
        data_pangan_tersembunyi: document.getElementById('data-pangan-tersembunyi'),
        jumlah_urt: document.getElementById('jumlah-urt'),
        unit_takaran: document.getElementById('unit-takaran'),
        konversi_referensi: document.getElementById('konversi-referensi'),
        pilihan_nama_pangan: document.getElementById('pilihan-nama-pangan'),
        tombol_tambah: document.getElementById('tombol-tambah'),
        daftar_pangan_container: document.getElementById('daftar-pangan-container'),
        pangan_empty_state: document.getElementById('pangan-empty-state'),
        tombol_dropdown_pangan: document.getElementById('tombol-dropdown-pangan'),
        dropdown_pangan: document.getElementById('dropdown-pangan'),
        search_pangan: document.getElementById('search-pangan'),
        options_pangan: document.getElementById('options-pangan'),
        selected_pangan_text: document.getElementById('selected-pangan-text'),
    };

    window.daftar_pangan = [];

    const shorten_unit = (unit) => {
        const unit_map = {
            'kilogram': 'kg',
            'ons': 'ons',
            'butir': 'butir',
            'liter': 'L',
            'gram': 'g',
            'potong': 'potong',
            'buah': 'buah',
            'porsi': 'porsi',
            'gelas': 'gelas',
            'mangkok kecil': 'mangkok kecil',
            '50 mililiter': '50ml',
            '250 mililiter': '250ml',
            '337 gram': '337g',
            'bungkus': 'bungkus',
            '2 gram': '2g',
            '20 gram': '20g',
            '100 mililiter': '100ml',
            '80 gram': '80g',
            '150 gram': '150g',
            'porsi 5 tusuk': '5 tusuk',
            '200 mililiter': '200ml',
            'biji sedang': 'biji',
            'sendok makan': 'sdm',
            'kg': 'kg',
            'tusuk': 'tusuk',
        };
        return unit_map[unit.toLowerCase()] || unit;
    };

    const init_dropdown = () => {
        dom.pilihan_nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
        dom.options_pangan.innerHTML = '';

        if (!controller.semua_nama_pangan || Object.keys(controller.semua_nama_pangan).length === 0) {
            const option = document.createElement('option');
            option.textContent = 'Tidak ada data pangan';
            option.disabled = true;
            dom.pilihan_nama_pangan.appendChild(option);
            return;
        }

        const sortir_nama_pangan = Object.entries(controller.semua_nama_pangan).sort((a, b) => {
            const namaA = a[1].nama_pangan.toLowerCase();
            const namaB = b[1].nama_pangan.toLowerCase();
            return namaA.localeCompare(namaB);
        });

        sortir_nama_pangan.forEach(([id, item]) => {
            let opsi = document.createElement('option');
            opsi.value = id;
            opsi.textContent = item.nama_pangan || 'Nama tidak tersedia';
            opsi.dataset.id_takaran = item.id_takaran || '';
            opsi.dataset.referensi_urt = item.referensi_urt || 'Tidak ada takaran';
            opsi.dataset.referensi_gram_berat = item.referensi_gram_beret || '0.00';
            dom.pilihan_nama_pangan.appendChild(opsi);

            let list_item = document.createElement('li');
            list_item.className = 'option-item cursor-pointer px-4 py-3 hover:bg-gray-100';
            list_item.dataset.value = id;
            list_item.dataset.label = item.nama_pangan || 'Nama tidak tersedia';
            list_item.dataset.id_takaran = item.id_takaran || '';
            list_item.dataset.referensi_urt = item.referensi_urt || 'Tidak ada takaran';
            list_item.dataset.referensi_gram_berat = item.referensi_gram_beret || '0.00';
            list_item.textContent = item.nama_pangan || 'Nama tidak tersedia';
            dom.options_pangan.appendChild(list_item);
        });
    };

    const setup_event_listeners = () => {
        dom.tombol_dropdown_pangan.addEventListener('click', (e) => {
            e.stopPropagation();
            dom.dropdown_pangan.classList.toggle('hidden');
            if (!dom.dropdown_pangan.classList.contains('hidden')) {
                dom.search_pangan.focus();
                dom.search_pangan.value = '';
                filter_options('');
            }
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.custom-select-pangan')) dom.dropdown_pangan.classList.add('hidden');
        });

        dom.search_pangan.addEventListener('click', (e) => e.stopPropagation());
        dom.search_pangan.addEventListener('input', (e) => filter_options(e.target.value.toLowerCase()));

        dom.options_pangan.addEventListener('click', (e) => {
            const item = e.target.closest('li.option-item');
            if (item) {
                const value = item.dataset.value;
                const label = item.dataset.label;
                const id_takaran = item.dataset.id_takaran;
                const referensi_urt = item.dataset.referensi_urt;
                const referensi_gram_beret = item.dataset.referensi_gram_beret;

                dom.selected_pangan_text.textContent = label;
                dom.pilihan_nama_pangan.value = value;

                const unit = controller.semua_takaran[id_takaran] || '';
                dom.unit_takaran.textContent = unit ? shorten_unit(unit) : '';

                const referensi_gram_berat = parseFloat(referensi_gram_beret);
                dom.konversi_referensi.textContent = referensi_urt && referensi_gram_berat ? `${referensi_urt} = ${referensi_gram_berat.toFixed(2).replace('.', ',')} gram` : 'Konversi tidak tersedia';
                dom.dropdown_pangan.classList.add('hidden');
            }
        });

        dom.tombol_tambah.addEventListener('click', tambah_pangan);
    };

    const filter_options = (query) => {
        const items = dom.options_pangan.querySelectorAll('li.option-item');
        let any_visible = false;

        items.forEach((item) => {
            if (item.textContent.toLowerCase().includes(query)) {
                item.style.display = '';
                any_visible = true;
            } else {
                item.style.display = 'none';
            }
        });

        let no_result_message = dom.options_pangan.querySelector('.no-results');
        if (!any_visible) {
            if (!no_result_message) {
                no_result_message = document.createElement('li');
                no_result_message.className = 'no-results px-4 py-3 text-gray-500 italic text-center';
                no_result_message.textContent = 'Tidak ada hasil yang ditemukan';
                dom.options_pangan.appendChild(no_result_message);
            }
        } else if (no_result_message) {
            no_result_message.remove();
        }
    };

    const atur_ulang_formulir = () => {
        dom.pilihan_nama_pangan.selectedIndex = 0;
        dom.selected_pangan_text.textContent = 'Pilih Nama Pangan';
        dom.jumlah_urt.value = '';
        dom.unit_takaran.textContent = '';
        dom.konversi_referensi.textContent = '';
    };

    const perbarui_data_tersembunyi = () => {
        dom.data_pangan_tersembunyi.innerHTML = '';
        window.daftar_pangan.forEach((item, indeks) => {
            const masukan_id_pangan = document.createElement('input');
            masukan_id_pangan.type = 'hidden';
            masukan_id_pangan.name = `detail_pangan_keluarga[${indeks}][nama_pangan]`;
            masukan_id_pangan.value = item.nama_pangan;

            const masukan_jumlah_urt = document.createElement('input');
            masukan_jumlah_urt.type = 'hidden';
            masukan_jumlah_urt.name = `detail_pangan_keluarga[${indeks}][jumlah_urt]`;
            masukan_jumlah_urt.value = item.jumlah_urt;

            dom.data_pangan_tersembunyi.appendChild(masukan_id_pangan);
            dom.data_pangan_tersembunyi.appendChild(masukan_jumlah_urt);
        });
    };

    const perbarui_tabel = () => {
        const existing_items = dom.daftar_pangan_container.querySelectorAll('.pangan-item');
        existing_items.forEach((item) => item.remove());

        if (window.daftar_pangan.length > 0) {
            dom.pangan_empty_state.style.display = 'none';
        } else {
            dom.pangan_empty_state.style.display = 'block';
            perbarui_data_tersembunyi();
            return;
        }

        window.daftar_pangan.forEach((item, indeks) => {
            const row = document.createElement('div');
            row.className = 'pangan-item grid grid-cols-[40%_40%_20%] place-items-center border-b border-gray-200 text-sm transition-colors';
            row.innerHTML = `
                <h5 class="text-gray-700 text-center">${item.teks_nama_pangan}</h5>
                <h5 class="text-gray-700 text-center">${item.jumlah_urt} ${item.takaran ? `(${item.takaran})` : ''}</h5>
                <span class="px-6 py-4 flex justify-center">
                    <button type="button" data-hapus="${indeks}" class="flex h-fit transform cursor-pointer items-center rounded-lg bg-red-600 px-5 py-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-red-500">
                        <i class="fa-solid fa-trash mr-4"></i> Hapus
                    </button>
                </span>
            `;
            dom.daftar_pangan_container.appendChild(row);
        });

        document.querySelectorAll('button[data-hapus]').forEach((button) => button.addEventListener('click', () => hapus_pangan(parseInt(button.getAttribute('data-hapus')))));
        perbarui_data_tersembunyi();
    };

    const tambah_pangan = () => {
        try {
            if (!dom.pilihan_nama_pangan.value || !dom.jumlah_urt.value) return alert('Semua bidang harus diisi dengan data yang valid!');

            const jumlah_urt_value = Number(dom.jumlah_urt.value);
            if (isNaN(jumlah_urt_value) || jumlah_urt_value <= 0) return alert('Jumlah URT harus berupa angka positif!');

            const selected_option = dom.options_pangan.querySelector(`li[data-value="${dom.pilihan_nama_pangan.value}"]`);
            if (!selected_option) return alert('Pilihan nama pangan tidak valid!');

            const id_takaran = selected_option.dataset.id_takaran;
            const takaran = controller.semua_takaran[id_takaran] || '';

            if (window.daftar_pangan.some((item) => item.nama_pangan === dom.pilihan_nama_pangan.value)) return alert('Data pangan tersebut sudah ditambahkan!');

            const new_item = {
                nama_pangan: dom.pilihan_nama_pangan.value,
                jumlah_urt: dom.jumlah_urt.value,
                takaran: takaran,
                teks_nama_pangan: selected_option.dataset.label || 'Nama tidak tersedia',
            };

            window.daftar_pangan.push(new_item);
            atur_ulang_formulir();
            perbarui_tabel();
        } catch (error) {
            console.error('Terjadi kesalahan saat menambah data:', error.message);
            alert('Terjadi kesalahan saat menambah data: ' + error.message);
        }
    };

    const hapus_pangan = (indeks) => {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.daftar_pangan.splice(indeks, 1);
            perbarui_tabel();
        }
    };

    const load_saved_data = () => {
        if (controller.jumlah_takaran && Object.keys(controller.jumlah_takaran).length > 0) {
            Object.entries(controller.jumlah_takaran).forEach(([id_pangan, jumlah_urt]) => {
                const nama_pangan_data = controller.nama_pangan[id_pangan] || { nama_pangan: 'Tidak ditemukan', id_takaran: null };
                window.daftar_pangan.push({
                    nama_pangan: id_pangan,
                    jumlah_urt: jumlah_urt,
                    takaran: controller.takaran[id_pangan] || '',
                    teks_nama_pangan: nama_pangan_data.nama_pangan,
                });
            });
        }
    };

    try {
        init_dropdown();
        setup_event_listeners();
        load_saved_data();
        perbarui_tabel();
    } catch (error) {
        console.error('Terjadi kesalahan saat inisialisasi: ', error.message);
        alert('Terjadi kesalahan saat mengambil data: ' + error.message);
    }
});