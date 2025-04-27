document.addEventListener('DOMContentLoaded', () => {
    const data_pangan_tersembunyi = document.getElementById('data-pangan-tersembunyi');
    const jumlah_urt = document.getElementById('jumlah-urt');
    const unit_takaran = document.getElementById('unit-takaran');
    const konversi_referensi = document.getElementById('konversi-referensi');
    const pilihan_nama_pangan = document.getElementById('pilihan-nama-pangan');
    const tombol_tambah = document.getElementById('tombol-tambah');
    const daftar_pangan_container = document.getElementById('daftar-pangan-container');
    const pangan_empty_state = document.getElementById('pangan-empty-state');
    const tombol_dropdown_pangan = document.getElementById('tombol-dropdown-pangan');
    const dropdown_pangan = document.getElementById('dropdown-pangan');
    const search_pangan = document.getElementById('search-pangan');
    const options_pangan = document.getElementById('options-pangan');
    const selected_pangan_text = document.getElementById('selected-pangan-text');

    const nama_pangan = window.nama_pangan || {};
    const takaran = window.takaran || {};

    if (!window.daftar_pangan) window.daftar_pangan = [];

    const sortir_nama_pangan = Object.entries(nama_pangan).sort((a, b) => {
        const namaA = a[1].nama_pangan.toLowerCase();
        const namaB = b[1].nama_pangan.toLowerCase();
        return namaA.localeCompare(namaB);
    });

    pilihan_nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
    options_pangan.innerHTML = '';

    sortir_nama_pangan.forEach(([id, nama]) => {
        let opsi = document.createElement('option');
        opsi.value = nama.id_pangan || id;
        opsi.textContent = nama.nama_pangan;
        opsi.dataset.id_takaran = nama.id_takaran || '';
        opsi.dataset.referensi_urt = nama.referensi_urt || 'Tidak ada takaran';
        opsi.dataset.referensi_gram_berat = nama.referensi_gram_berat || '0.00';
        pilihan_nama_pangan.appendChild(opsi);

        let item = document.createElement('li');
        item.className = 'option-item cursor-pointer px-4 py-3 hover:bg-gray-100';
        item.dataset.value = nama.id_pangan || id;
        item.dataset.label = nama.nama_pangan;
        item.textContent = nama.nama_pangan;
        options_pangan.appendChild(item);
    });

    tombol_dropdown_pangan.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown_pangan.classList.toggle('hidden');
        if (!dropdown_pangan.classList.contains('hidden')) {
            search_pangan.focus();
            search_pangan.value = '';
            filterOptions('');
        }
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.custom-select-pangan')) dropdown_pangan.classList.add('hidden');
    });

    search_pangan.addEventListener('click', (e) => e.stopPropagation());
    search_pangan.addEventListener('input', (e) => filterOptions(e.target.value.toLowerCase()));

    function filterOptions(query) {
        const items = options_pangan.querySelectorAll('li');
        let any_visible = false;

        items.forEach((item) => {
            if (item.textContent.toLowerCase().includes(query)) {
                item.style.display = '';
                any_visible = true;
            } else {
                item.style.display = 'none';
            }
        });

        let no_result_message = options_pangan.querySelector('.no-results');
        if (!any_visible) {
            if (!no_result_message) {
                no_result_message = document.createElement('li');
                no_result_message.className = 'no-results px-4 py-3 text-gray-500 italic text-center';
                no_result_message.textContent = 'Tidak ada hasil yang ditemukan';
                options_pangan.appendChild(no_result_message);
            }
        } else if (no_result_message) {
            no_result_message.remove();
        }
    }

    options_pangan.addEventListener('click', (e) => {
        const item = e.target.closest('li.option-item');
        if (item) {
            const value = item.dataset.value;
            const label = item.dataset.label;
            selected_pangan_text.textContent = label;
            pilihan_nama_pangan.value = value;
            const event = new Event('change');
            pilihan_nama_pangan.dispatchEvent(event);
            dropdown_pangan.classList.add('hidden');
        }
    });

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

    pilihan_nama_pangan.addEventListener('change', () => {
        const selectedOption = pilihan_nama_pangan.options[pilihan_nama_pangan.selectedIndex];
        if (selectedOption && !selectedOption.disabled) {
            const id_takaran = selectedOption.dataset.id_takaran;
            const unit = takaran[id_takaran] || '';
            unit_takaran.textContent = unit ? `${shorten_unit(unit)}` : '';
            const referensi_urt = selectedOption.dataset.referensi_urt;
            const referensi_gram_berat = parseFloat(selectedOption.dataset.referensi_gram_berat);
            konversi_referensi.textContent = referensi_urt && referensi_gram_berat ? `${referensi_urt} = ${referensi_gram_berat.toFixed(2).replace('.', ',')} gram` : 'Konversi tidak tersedia';
        } else {
            unit_takaran.textContent = '';
            konversi_referensi.textContent = '';
        }
    });

    const atur_ulang_formulir = () => {
        pilihan_nama_pangan.selectedIndex = 0;
        selected_pangan_text.textContent = 'Pilih Nama Pangan';
        jumlah_urt.value = '';
        unit_takaran.textContent = '';
        konversi_referensi.textContent = '';
    };

    const perbarui_data_tersembunyi = () => {
        data_pangan_tersembunyi.innerHTML = '';
        window.daftar_pangan.forEach((item, indeks) => {
            const masukan_id_pangan = document.createElement('input');
            masukan_id_pangan.type = 'hidden';
            masukan_id_pangan.name = `detail_pangan_keluarga[${indeks}][nama_pangan]`;
            masukan_id_pangan.value = item.nama_pangan;

            const masukan_jumlah_urt = document.createElement('input');
            masukan_jumlah_urt.type = 'hidden';
            masukan_jumlah_urt.name = `detail_pangan_keluarga[${indeks}][jumlah_urt]`;
            masukan_jumlah_urt.value = item.jumlah_urt;

            data_pangan_tersembunyi.appendChild(masukan_id_pangan);
            data_pangan_tersembunyi.appendChild(masukan_jumlah_urt);
        });
    };

    const perbarui_tabel = () => {
        const existing_items = daftar_pangan_container.querySelectorAll('.pangan-item');
        existing_items.forEach((item) => item.remove());

        if (window.daftar_pangan.length > 0) {
            pangan_empty_state.style.display = 'none';
        } else {
            pangan_empty_state.style.display = 'block';
            perbarui_data_tersembunyi();
            return;
        }

        window.daftar_pangan.forEach((item, indeks) => {
            const row = document.createElement('div');
            row.className = 'pangan-item grid grid-cols-[40%_40%_20%] place-items-center border-b border-gray-200 transition-colors';
            row.innerHTML = `
                <h5 class="text-gray-700 text-center">${item.teks_nama_pangan}</h5>
                <h5 class="text-gray-700 text-center">${item.jumlah_urt} (${item.takaran || ''})</h5>
                <span class="px-6 py-4 flex justify-center">
                    <button type="button" data-hapus="${indeks}" class="cursor-pointer flex items-center justify-center px-4 py-2 bg-red-500 text-white rounded-lg transition-colors duration-150 shadow-sm hover:bg-red-600 text-sm">
                        <i class="fa-solid fa-trash mr-2"></i> Hapus
                    </button>
                </span>
            `;
            daftar_pangan_container.appendChild(row);
        });

        document.querySelectorAll('button[data-hapus]').forEach((tombol) => tombol.addEventListener('click', () => hapus_pangan(parseInt(tombol.getAttribute('data-hapus')))));
        perbarui_data_tersembunyi();
    };

    const hapus_pangan = (indeks) => {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.daftar_pangan.splice(indeks, 1);
            perbarui_tabel();
        }
    };

    tombol_tambah.addEventListener('click', () => {
        if (pilihan_nama_pangan.selectedIndex === 0 || !pilihan_nama_pangan.value || !jumlah_urt.value) return alert('Semua bidang harus diisi dengan data yang valid!');
        
        const opsi_terpilih = pilihan_nama_pangan.options[pilihan_nama_pangan.selectedIndex];
        const id_takaran = opsi_terpilih.dataset.id_takaran;
        const unit = takaran[id_takaran] || '';

        if (!jumlah_urt.value || isNaN(jumlah_urt.value) || Number(jumlah_urt.value) <= 0) return alert('Jumlah URT harus berupa angka positif!');
        if (window.daftar_pangan.some((item) => item.nama_pangan === opsi_terpilih.value)) return alert('Pangan ini sudah ditambahkan!');

        const item = {
            nama_pangan: opsi_terpilih.value,
            jumlah_urt: jumlah_urt.value,
            takaran: unit,
            teks_nama_pangan: opsi_terpilih.textContent.trim(),
        };

        window.daftar_pangan.push(item);
        atur_ulang_formulir();
        perbarui_tabel();
    });

    perbarui_tabel();
});