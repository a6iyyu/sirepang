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
    <div id="hidden-pangan-inputs">
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
            const hidden_inputs_container = document.getElementById('hidden-pangan-inputs');

            let daftar_pangan = @json($preview_pangan);
            console.log(daftar_pangan); //cek array sdh ada, di field undefined

            const update_hidden_inputs = () => {
                hidden_inputs_container.innerHTML = '';

                daftar_pangan.forEach((item, index) => {
                    const jenis_pangan_input = document.createElement('input');
                    jenis_pangan_input.type = 'hidden';
                    jenis_pangan_input.name = `detail_pangan_keluarga[${index}][jenis_pangan]`;
                    jenis_pangan_input.value = item.jenis_pangan;

                    const pangan_input = document.createElement('input');
                    pangan_input.type = 'hidden';
                    pangan_input.name = `detail_pangan_keluarga[${index}][nama_pangan]`;
                    pangan_input.value = item.nama_pangan;

                    const urt_input = document.createElement('input');
                    urt_input.type = 'hidden';
                    urt_input.name = `detail_pangan_keluarga[${index}][jumlah_urt]`;
                    urt_input.value = item.urt;

                    hidden_inputs_container.appendChild(jenis_pangan_input);
                    hidden_inputs_container.appendChild(pangan_input);
                    hidden_inputs_container.appendChild(urt_input);
                });
            };

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
                        <td class="flex px-6 py-4 items-center justify-center space-x-4">
                            <button type="button" data-delete="${index}" class="flex items-center justify-center px-4 py-3 bg-red-500 text-white rounded-lg transition-colors duration-150 shadow-sm hover:bg-red-600">
                                <i class="fa-solid fa-trash mr-3"></i> Hapus
                            </button>
                        </td>
                    `;
                    baris_tabel_formulir_pangan.parentNode.insertBefore(row, baris_tabel_formulir_pangan);
                });

                document.querySelectorAll('button[data-delete]').forEach(btn => btn.addEventListener('click', () => hapus_pangan(parseInt(btn.getAttribute('data-delete')))));
                update_hidden_inputs();
            };

            const hapus_pangan = (index) => {
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

            const pilihan_nama_pangan = (jenis_id) => {
                nama_pangan.innerHTML = '<option value="" selected disabled>Pilih Nama Pangan</option>';
                if (@json($nama_pangan)[jenis_id]) {
                    Object.entries(@json($nama_pangan)[jenis_id]).forEach(([id, nama]) => {
                        const option = document.createElement("option");
                        option.value = id;
                        option.textContent = nama;
                        nama_pangan.appendChild(option);
                    });
                }
            };

            nama_jenis.addEventListener("change", () => pilihan_nama_pangan(nama_jenis.value));

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
                perbarui_tabel();
            });

            perbarui_tabel();
        });
    </script>
@endpush
