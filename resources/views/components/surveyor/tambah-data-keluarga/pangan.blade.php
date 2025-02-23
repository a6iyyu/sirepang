<h3 class="mb-6 cursor-default font-bold text-3xl text-primary">
    Masukkan Data Pangan
</h3>

<form id="panganForm">
    <div class="overflow-x-auto shadow-lg rounded-">
        <table class="w-full border-collapse bg-transparent">
            <thead>
                <tr class="bg-green-dark">
                    <th class="px-6 py-4 text-left text-white font-semibold">Jenis Pangan</th>
                    <th class="px-6 py-4 text-left text-white font-semibold">Nama Pangan</th>
                    <th class="px-6 py-4 text-left text-white font-semibold">Takaran URT</th>
                    <th class="px-6 py-4 text-left text-white font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody id="panganTableBody">
                <tr id="form-row">
                    <td class="px-6 py-4">
                        <select id="nama_jenis" class="w-full rounded-lg border border-green-800 focus:border-green-500 focus:ring-2 focus:ring-green-800 transparent py-2.5 px-2">
                            <option value="" selected disabled>Pilih Jenis Pangan</option>
                            @foreach($jenis_pangan as $id => $jenis)
                                <option value="{{ $id }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <select id="nama_pangan" class="w-full rounded-lg border border-green-800 focus:border-green-500 focus:ring-2 focus:ring-green-800 bg-transparent py-2.5 px-2">
                            <option value="" selected disabled>Pilih Nama Pangan</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="number" id="urt" class="w-full rounded-lg border border-green-800 focus:border-green-500 focus:ring-2 focus:ring-green-800 bg-transparent py-2.5 px-2" placeholder="Cth. 1">
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" id="tambah" class="px-4 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
                            <i class="fa-solid fa-plus mr-1"></i> Tambah Baru
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-6 flex justify-end">
        <button type="submit" id="submitForm" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
            <i class="fa-solid fa-save mr-2"></i> Simpan Semua Data
        </button>
    </div>
</form>

@push('skrip')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const panganForm = document.getElementById('panganForm');
    const formRow = document.getElementById('form-row');
    const tambah = document.getElementById('tambah');
    const jenisSelect = document.getElementById('nama_jenis');
    const namaSelect = document.getElementById('nama_pangan');
    const urtInput = document.getElementById('urt');

    let daftarPangan = [];

    const perbaruiTabel = () => {
        const existingRows = document.querySelectorAll('tr[data-pangan-row]');
        existingRows.forEach(row => row.remove());

        daftarPangan.forEach((item, index) => {
            const row = document.createElement('tr');
            row.setAttribute('data-pangan-row', '');
            row.classList.add('transition-colors', 'duration-150');
            row.innerHTML = `
                <td class="px-6 py-4 text-gray-700">${item.jenis_pangan_text}</td>
                <td class="px-6 py-4 text-gray-700">${item.nama_pangan_text}</td>
                <td class="px-6 py-4 text-gray-700">${item.urt}</td>
                <td class="px-6 py-4">
                    <button type="button" onclick="editPangan(${index})" class="mr-2 px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
                        <i class="fa-solid fa-pencil mr-1"></i> Edit
                    </button>
                    <button type="button" onclick="hapusPangan(${index})" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-150 shadow-sm">
                        <i class="fa-solid fa-trash mr-1"></i> Hapus
                    </button>
                </td>
            `;
            formRow.parentNode.insertBefore(row, formRow);
        });
    };

    window.editPangan = (index) => {
        const item = daftarPangan[index];
        jenisSelect.value = item.jenis_pangan;
        pilihanNamaPangan(item.jenis_pangan, item.nama_pangan);
        urtInput.value = item.urt;
        daftarPangan.splice(index, 1);
        perbaruiTabel();
    };

    window.hapusPangan = (index) => {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            daftarPangan.splice(index, 1);
            perbaruiTabel();
        }
    };

    const resetFormulir = () => {
        jenisSelect.value = "";
        namaSelect.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
        urtInput.value = "";
    };

    const pilihanNamaPangan = (namaJenis, pilihan = "") => {
        namaSelect.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
        if (@json($nama_pangan)[namaJenis]) {
            Object.entries(@json($nama_pangan)[namaJenis]).forEach(([id, nama]) => {
                const option = document.createElement("option");
                option.value = nama;
                option.textContent = nama;
                if (id === pilihan) option.selected = true;
                namaSelect.appendChild(option);
            });
        }
    };

    jenisSelect.addEventListener("change", () => {
        pilihanNamaPangan(jenisSelect.value);
    });

    tambah.addEventListener('click', () => {
        if (!jenisSelect.value || !namaSelect.value || !urtInput.value) {
            alert("Semua bidang harus diisi!");
            return;
        }

        const item = {
            jenis_pangan: jenisSelect.value,
            nama_pangan: namaSelect.value,
            urt: urtInput.value,
            jenis_pangan_text: jenisSelect.options[jenisSelect.selectedIndex].text,
            nama_pangan_text: namaSelect.options[namaSelect.selectedIndex].text
        };

        daftarPangan.push(item);
        resetFormulir();
    });

    panganForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // Tambahkan data aktif di form ke daftar jika ada
        if (jenisSelect.value && namaSelect.value && urtInput.value) {
            const item = {
                jenis_pangan: jenisSelect.value,
                nama_pangan: namaSelect.value,
                urt: urtInput.value,
                jenis_pangan_text: jenisSelect.options[jenisSelect.selectedIndex].text,
                nama_pangan_text: namaSelect.options[namaSelect.selectedIndex].text
            };
            daftarPangan.push(item);
        }

        if (daftarPangan.length === 0) {
            alert('Mohon tambahkan setidaknya satu data pangan!');
            return;
        }

        const formData = new FormData();
        daftarPangan.forEach((item, index) => {
            formData.append(`detail_pangan_keluarga[${index}][jenis_pangan]`, item.jenis_pangan);
            formData.append(`detail_pangan_keluarga[${index}][nama_pangan]`, item.nama_pangan);
            formData.append(`detail_pangan_keluarga[${index}][jumlah_urt]`, item.urt);
        });

        fetch(panganForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Data berhasil disimpan!');
                daftarPangan = [];
                perbaruiTabel();
                resetFormulir();
            } else {
                alert('Terjadi kesalahan saat menyimpan data.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan data.');
        });
    });

    perbaruiTabel();
});
</script>
@endpush
