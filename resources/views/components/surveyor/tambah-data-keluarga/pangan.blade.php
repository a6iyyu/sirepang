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
        <button type="button" id="simpan-semua" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
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
            const simpan_semua = document.getElementById('simpan-semua');
            const nama_jenis = document.getElementById('nama-jenis');
            const nama_pangan = document.getElementById('nama-pangan');
            const urt = document.getElementById('urt');

            let daftar_pangan = [];
            let edit_index = -1; // Used to track if we're editing an existing item

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
                            <button type="button" data-edit="${index}" class="mr-2 px-3 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-150 shadow-sm">
                                <i class="fa-solid fa-pencil mr-1"></i> Edit
                            </button>
                            <button type="button" data-delete="${index}" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-150 shadow-sm">
                                <i class="fa-solid fa-trash mr-1"></i> Hapus
                            </button>
                        </td>
                    `;
                    baris_tabel_formulir_pangan.parentNode.insertBefore(row, baris_tabel_formulir_pangan);
                });

                // Attach event listeners to newly created buttons
                document.querySelectorAll('button[data-edit]').forEach(btn => {
                    btn.addEventListener('click', () => edit_pangan(parseInt(btn.getAttribute('data-edit'))));
                });

                document.querySelectorAll('button[data-delete]').forEach(btn => {
                    btn.addEventListener('click', () => hapus_pangan(parseInt(btn.getAttribute('data-delete'))));
                });
            };

            const edit_pangan = (index) => {
                const item = daftar_pangan[index];
                nama_jenis.value = item.jenis_pangan;

                // Load nama pangan options first, then set the value
                pilihan_nama_pangan(item.jenis_pangan, () => {
                    // Find and select the correct option
                    Array.from(nama_pangan.options).forEach(option => {
                        if (option.value === item.nama_pangan) {
                            option.selected = true;
                        }
                    });
                });

                urt.value = item.urt;
                edit_index = index; // Set edit mode

                // Change the add button text to indicate edit mode
                tambah.innerHTML = '<i class="fa-solid fa-check"></i>';
                tambah.classList.remove('bg-green-600', 'hover:bg-green-700');
                tambah.classList.add('bg-blue-600', 'hover:bg-blue-700');
            };

            const hapus_pangan = (index) => {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    daftar_pangan.splice(index, 1);
                    perbarui_tabel();

                    // If we were editing the item that was just deleted, reset the form
                    if (edit_index === index) {
                        reset_formulir();
                    }
                }
            };

            const reset_formulir = () => {
                nama_jenis.value = "";
                nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
                urt.value = "";
                edit_index = -1; // Exit edit mode

                // Reset add button to normal state
                tambah.innerHTML = '<i class="fa-solid fa-plus"></i>';
                tambah.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                tambah.classList.add('bg-green-600', 'hover:bg-green-700');
            };

            const pilihan_nama_pangan = (jenis_id, callback = null) => {
                nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
                if (@json($nama_pangan)[jenis_id]) {
                    Object.entries(@json($nama_pangan)[jenis_id]).forEach(([id, nama]) => {
                        const option = document.createElement("option");
                        option.value = id;
                        option.textContent = nama;
                        nama_pangan.appendChild(option);
                    });
                }
                if (callback && typeof callback === 'function') {
                    callback();
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

                if (edit_index >= 0) {
                    // Update existing item
                    daftar_pangan[edit_index] = item;
                } else {
                    // Add new item
                    daftar_pangan.push(item);
                }

                reset_formulir();
                perbarui_tabel();
            });

            simpan_semua.addEventListener('click', () => {
                if (nama_jenis.value && nama_pangan.value && urt.value) {
                    // Add current form data if not empty
                    const item = {
                        jenis_pangan: nama_jenis.value,
                        nama_pangan: nama_pangan.value,
                        urt: urt.value,
                        jenis_pangan_text: nama_jenis.options[nama_jenis.selectedIndex].text,
                        nama_pangan_text: nama_pangan.options[nama_pangan.selectedIndex].text
                    };

                    if (edit_index >= 0) {
                        daftar_pangan[edit_index] = item;
                    } else {
                        daftar_pangan.push(item);
                    }

                    perbarui_tabel();
                    reset_formulir();
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

                fetch(window.location.href, {
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
                        } else {
                            alert('Terjadi kesalahan saat menyimpan data: ' + (data.message || 'Kesalahan tidak diketahui'));
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
