<h3 class="mb-6 cursor-default font-bold text-3xl text-primary">
    Masukkan Data Pangan
</h3>
<section id="formulir-pangan">
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
            <tbody>
                <tr id="baris-tabel-formulir-pangan">
                    <td class="px-6 py-4">
                        <select id="nama-jenis" class="appearance-none w-full px-4 py-3 border-2 border-gray-700 rounded-md bg-transparent focus:outline-none focus:ring-2 focus:ring-gray-100">
                            <option value="" selected disabled>Pilih Jenis Pangan</option>
                            @foreach ($jenis_pangan as $id => $jenis)
                                <option value="{{ $id }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <select id="nama-pangan" class="appearance-none w-full px-4 py-3 border-2 border-gray-700 rounded-md bg-transparent focus:outline-none focus:ring-2 focus:ring-gray-100">
                            <option value="" selected disabled>Pilih Nama Pangan</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input
                            type="number"
                            id="urt"
                            class="appearance-none w-full px-4 py-3 border-2 border-gray-700 rounded-md bg-transparent focus:outline-none focus:ring-2 focus:ring-gray-100"
                            placeholder="Cth. 1"
                        />
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" id="tambah" class="cursor-pointer px-4 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-6 flex justify-end">
        <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
            <i class="fa-solid fa-save mr-2"></i> Simpan Semua Data
        </button>
    </div>
</section>

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const formulir_pangan = document.getElementById('formulir-pangan');
            const baris_tabel_formulir_pangan = document.getElementById('baris-tabel-formulir-pangan');
            const tambah = document.getElementById('tambah');
            const nama_jenis = document.getElementById('nama-jenis');
            const nama_pangan = document.getElementById('nama-pangan');
            const urt = document.getElementById('urt');

            let daftar_pangan = [];

            const perbarui_tabel = () => {
                document.querySelectorAll('tr[data-pangan-row]').forEach(row => row.remove());
                daftar_pangan.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.setAttribute('data-pangan-row', '');
                    row.classList.add('transition-colors', 'duration-150');
                    row.innerHTML = `
                        <td class="px-6 py-4 text-gray-700">${item.jenis_pangan_text}</td>
                        <td class="px-6 py-4 text-gray-700">${item.nama_pangan_text}</td>
                        <td class="px-6 py-4 text-gray-700">${item.urt}</td>
                        <td class="px-6 py-4">
                            <button type="button" onclick="edit_pangan(${index})" class="mr-2 px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
                                <i class="fa-solid fa-pencil mr-1"></i> Edit
                            </button>
                            <button type="button" onclick="hapus_pangan(${index})" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-150 shadow-sm">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </td>
                    `;
                    baris_tabel_formulir_pangan.parentNode.insertBefore(row, baris_tabel_formulir_pangan);
                });
            };

            window.edit_pangan = (index) => {
                const item = daftar_pangan[index];
                nama_jenis.value = item.jenis_pangan;
                pilihan_nama_pangan(item.jenis_pangan, item.nama_pangan);
                urt.value = item.urt;
                daftar_pangan.splice(index, 1);
                perbarui_tabel();
            };

            window.hapus_pangan = (index) => {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    daftar_pangan.splice(index, 1);
                    perbarui_tabel();
                }
            };

            const reset_formulir = () => {
                nama_jenis.value = "";
                nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
                urt.value = "";
            };

            const pilihan_nama_pangan = (nama_jenis, pilihan = "") => {
                nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
                if (@json($nama_pangan)[nama_jenis]) {
                    Object.entries(@json($nama_pangan)[nama_jenis]).forEach(([id, nama]) => {
                        const option = document.createElement("option");
                        option.value = nama;
                        option.textContent = nama;
                        if (id === pilihan) option.selected = true;
                        nama_pangan.appendChild(option);
                    });
                }
            };

            nama_jenis.addEventListener("change", () => {
                pilihan_nama_pangan(nama_jenis.value);
            });

            tambah.addEventListener('click', () => {
                if (!nama_jenis.value || !nama_pangan.value || !urt.value) {
                    alert("Semua bidang harus diisi!");
                    return;
                }

                const item = {
                    jenis_pangan: nama_jenis.value,
                    nama_pangan: nama_pangan.value,
                    urt: urt.value,
                    jenis_pangan_text: nama_jenis.options[nama_jenis.selectedIndex].text,
                    nama_pangan_text: nama_pangan.options[nama_pangan.selectedIndex].text
                };

                daftar_pangan.push(item);
                reset_formulir();
            });

            formulir_pangan.addEventListener('submit', (e) => {
                e.preventDefault();

                if (nama_jenis.value && nama_pangan.value && urt.value) {
                    const item = {
                        jenis_pangan: nama_jenis.value,
                        nama_pangan: nama_pangan.value,
                        urt: urt.value,
                        jenis_pangan_text: nama_jenis.options[nama_jenis.selectedIndex].text,
                        nama_pangan_text: nama_pangan.options[nama_pangan.selectedIndex].text
                    };
                    daftar_pangan.push(item);
                }

                if (daftar_pangan.length === 0) {
                    alert('Mohon tambahkan setidaknya satu data pangan!');
                    return;
                }

                const form_data = new FormData();
                daftar_pangan.forEach((item, index) => {
                    form_data.append(`detail_pangan_keluarga[${index}][jenis_pangan]`, item.jenis_pangan);
                    form_data.append(`detail_pangan_keluarga[${index}][nama_pangan]`, item.nama_pangan);
                    form_data.append(`detail_pangan_keluarga[${index}][jumlah_urt]`, item.urt);
                });

                fetch(formulir_pangan.action, {
                        body: form_data,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Data berhasil disimpan!');
                            daftar_pangan = [];
                            perbarui_tabel();
                            reset_formulir();
                        } else {
                            console.error('Terjadi kesalahan saat menyimpan data.');
                        }
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan saat menyimpan data: ', error);
                        alert('Terjadi kesalahan saat menyimpan data.');
                    });
            });

            perbarui_tabel();
        });
    </script>
@endpush