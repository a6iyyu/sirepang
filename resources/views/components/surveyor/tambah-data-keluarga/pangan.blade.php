<div class="relative w-full overflow-x-scroll rounded shadow-lg">
    <table class="w-full min-w-[600px] table-auto border-collapse bg-transparent">
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
                    <select id="pilihan-nama-pangan" class="w-full appearance-none rounded-md border-2 border-gray-700 bg-transparent px-4 py-3 focus:ring-2 focus:ring-gray-100 focus:outline-none">
                        <option value="" hidden>Pilih Nama Pangan</option>
                        @foreach ($nama_pangan as $id => $pangan)
                            <option value="{{ $id }}">{{ $pangan->nama_pangan }}</option>
                        @endforeach
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
    const baris_tabel_formulir_pangan = document.getElementById('baris-tabel-formulir-pangan');
    const data_pangan_tersembunyi = document.getElementById('data-pangan-tersembunyi');
    const jumlah_urt = document.getElementById('jumlah-urt');
    const judul_takaran_unit = document.getElementById('judul-takaran-unit');
    const pilihan_nama_pangan = document.getElementById('pilihan-nama-pangan');
    const tombol_tambah = document.getElementById('tombol-tambah');
    const nama_pangan = @json($nama_pangan);
    const takaran = @json($takaran);
    const formulir = document.getElementById('form-keluarga');

    if (!window.daftar_pangan) window.daftar_pangan = [];

    pilihan_nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
    Object.entries(nama_pangan).forEach(([id, nama]) => {
        let opsi = document.createElement('option');
        opsi.value = nama.id_pangan || id;
        opsi.textContent = nama.nama_pangan;
        opsi.dataset.takaran = takaran[nama.id_takaran] || '';
        pilihan_nama_pangan.appendChild(opsi);
    });

    Object.entries(nama_pangan).forEach(([id, nama]) => {
        let opsi = document.createElement('option');
        opsi.value = nama.id_pangan || id;
        opsi.textContent = `${nama.nama_pangan}`;
        opsi.dataset.takaran = takaran[nama.id_takaran] || '';
        pilihan_nama_pangan.appendChild(opsi);
    });

    pilihan_nama_pangan.addEventListener('change', () => {
        const selectedOption = pilihan_nama_pangan.options[pilihan_nama_pangan.selectedIndex];
        if (selectedOption && !selectedOption.disabled) {
            judul_takaran_unit.textContent = `(${selectedOption.dataset.takaran})`;
            console.log(`Selected food ID: ${selectedOption.value}`);
        } else {
            judul_takaran_unit.textContent = '';
        }
    });

    const atur_ulang_formulir = () => {
        pilihan_nama_pangan.selectedIndex = 0;
        jumlah_urt.value = '';
        judul_takaran_unit.textContent = '';
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
        document.querySelectorAll('tr[data-baris-pangan]').forEach((baris) => baris.remove());
        window.daftar_pangan.forEach((item, indeks) => {
            const baris = document.createElement('tr');
            baris.setAttribute('data-baris-pangan', '');
            baris.classList.add('transition-colors', 'duration-150');
            baris.innerHTML = `
                <td class="cursor-default px-6 py-4 text-gray-700">${item.teks_nama_pangan}</td>
                <td class="cursor-default px-6 py-4 text-gray-700">${item.jumlah_urt} ${item.takaran || ''}</td>
                <td class="flex px-6 py-4 items-center justify-center space-x-4">
                    <button type="button" data-hapus="${indeks}" class="cursor-pointer flex items-center justify-center px-4 py-3 bg-red-500 text-white rounded-lg transition-colors duration-150 shadow-sm hover:bg-red-600">
                        <i class="fa-solid fa-trash mr-3"></i> Hapus
                    </button>
                </td>
            `;
            baris_tabel_formulir_pangan.parentNode.insertBefore(baris, baris_tabel_formulir_pangan);
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
    console.log('Selected index:', pilihan_nama_pangan.selectedIndex);
    console.log('Selected value:', pilihan_nama_pangan.value);
    console.log('Selected option:', pilihan_nama_pangan.options[pilihan_nama_pangan.selectedIndex]);

    if (pilihan_nama_pangan.selectedIndex === 0 || !pilihan_nama_pangan.value || !jumlah_urt.value) {
        return alert('Semua bidang harus diisi dengan data yang valid!');
    }

    const opsi_terpilih = pilihan_nama_pangan.options[pilihan_nama_pangan.selectedIndex];
    console.log('Selected id_pangan:', opsi_terpilih.value); // Should log "1" not "0"

    const item = {
        nama_pangan: opsi_terpilih.value,
        jumlah_urt: jumlah_urt.value,
        takaran: opsi_terpilih.dataset.takaran || '',
        teks_nama_pangan: opsi_terpilih.textContent.trim(),
    };

    window.daftar_pangan.push(item);
    atur_ulang_formulir();
    perbarui_tabel();
});
});
    </script>
@endpush
