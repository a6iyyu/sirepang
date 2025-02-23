<h3 class="mb-6 cursor-default font-bold text-3xl text-primary">
    Masukkan Data Pangan
</h3>
<section id="form" class="hidden mb-6 bg-transparent rounded-lg border border-gray-200 p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <x-select name="nama_jenis" label="Jenis Pangan" :options="$jenis_pangan" />
        <x-select name="nama_pangan" label="Nama Pangan" :options="[]" />
        <x-input type="number" name="urt" label="Jumlah URT" icon="fa-solid fa-ruler" placeholder="Cth. 1" />
    </div>
    <span class="flex justify-end gap-2 mt-6">
        <button
            type="button"
            id="batalkan"
            class="flex items-center cursor-pointer h-fit rounded-lg px-5 py-2.5 transition-all transform duration-300 ease-in-out bg-green text-gray-700 border border-gray-300 hover:bg-gray-200"
        >
            Kembali
        </button>
        <button
            type="button"
            id="simpan"
            class="flex items-center cursor-pointer h-fit rounded-lg px-5 py-2.5 transition-all transform duration-300 ease-in-out bg-green-dark text-white hover:bg-green-700"
        >
            Simpan
        </button>
    </span>
</section>
<button
    type="button"
    id="tambah-pangan"
    class="mb-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-2.5 transition-all transform duration-300 ease-in-out bg-[#2c5e4f] text-white hover:bg-green-700"
>
    <i class="fa-solid fa-plus mr-2"></i>
    Tambah
</button>
<div class="my-8">
    @include('shared.table.table', [
        'headers' => ['Nama Pangan', 'Jenis Pangan', 'Takaran URT', 'Aksi'],
        'sortable' => ['Nama Pangan'],
        'rows' => [],
    ])
</div>
<input type="hidden" id="data_pangan" name="data_pangan" value="[]">

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById('form');
            const tambah_pangan = document.getElementById('tambah-pangan');
            const batalkan = document.getElementById('batalkan');
            const simpan = document.getElementById('simpan');
            const jenis_pangan = document.querySelector("[name='nama_jenis']");
            const nama_pangan = document.querySelector("[name='nama_pangan']");
            const urt = document.querySelector("[name='urt']");
            const data_pangan = document.getElementById('data_pangan');

            let daftar_pangan = [];
            let editing_index = null;

            const perbarui_tabel = () => {
                const tbody = document.querySelector("tbody");
                tbody.innerHTML = '';

                daftar_pangan.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.classList.add('flex', 'transition-colors', 'duration-200');
                    row.innerHTML = `
                        <td class="flex w-full items-center justify-center px-6 py-4">${item.nama_pangan_text}</td>
                        <td class="flex w-full items-center justify-center px-6 py-4">${item.jenis_pangan_text}</td>
                        <td class="flex w-full items-center justify-center px-6 py-4">${item.urt}</td>
                        <td class="flex w-full items-center justify-center px-6 py-4">
                            <button id="edit" class="cursor-pointer mr-2 transition-colors rounded-lg !text-sm px-4 py-3 bg-[#2c5e4f] text-white hover:bg-green-700" data-index="${index}">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <button id="delete" class="cursor-pointer transition-colors rounded-lg !text-sm px-4 py-3 bg-red-600 text-white hover:bg-red-500" data-index="${index}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });

                document.querySelectorAll("#edit").forEach(button => button.addEventListener("click", () => edit_pangan(button.dataset.index)));
                document.querySelectorAll("#delete").forEach(button => button.addEventListener("click", () => hapus_pangan(button.dataset.index)));
            };

            window.edit_pangan = (index) => {
                editing_index = index;
                const item = daftar_pangan[index];
                jenis_pangan.value = item.jenis_pangan;
                pilihan_nama_pangan(item.jenis_pangan, item.nama_pangan);
                urt.value = item.urt;

                form.classList.remove('hidden');
                tambah_pangan.classList.add('hidden');
            };

            const hapus_pangan = (index) => {
                daftar_pangan.splice(index, 1);
                perbarui_tabel();
                perbarui_masukan();
            };

            const reset_formulir = () => {
                jenis_pangan.value = "";
                pilihan_nama_pangan("");
                urt.value = "";
            };

            const perbarui_masukan = () => data_pangan.value = JSON.stringify(daftar_pangan);

            const pilihan_nama_pangan = (nama_jenis, pilihan = "") => {
                nama_pangan.innerHTML = "<option value='' selected disabled>Pilih Nama Pangan</option>";
                if (@json($nama_pangan)[nama_jenis]) {
                    Object.entries(@json($nama_pangan)[nama_jenis]).forEach(([id, nama]) => {
                        let option = document.createElement("option");
                        option.value = nama;
                        option.textContent = nama;
                        if (id === pilihan) option.selected = true;
                        nama_pangan.appendChild(option);
                    });
                }
            };

            tambah_pangan.addEventListener('click', () => {
                editing_index = null;
                reset_formulir();
                form.classList.remove('hidden');
                tambah_pangan.classList.add('hidden');
            });

            batalkan.addEventListener('click', () => {
                form.classList.add('hidden');
                tambah_pangan.classList.remove('hidden');
                reset_formulir();
                editing_index = null;
            });

            jenis_pangan.addEventListener("change", () => {
                pilihan_nama_pangan(jenis_pangan.value);
            });

            simpan.addEventListener('click', () => {
                if (!jenis_pangan.value || !nama_pangan.value || !urt.value) {
                    alert("Semua bidang harus diisi!");
                    return;
                }

                const item = {
                    jenis_pangan: jenis_pangan.value,
                    nama_pangan: nama_pangan.value,
                    urt: urt.value,
                    jenis_pangan_text: jenis_pangan.options[jenis_pangan.selectedIndex].text,
                    nama_pangan_text: nama_pangan.options[nama_pangan.selectedIndex].text
                };

                if (editing_index !== null) {
                    daftar_pangan[editing_index] = item;
                    editing_index = null;
                } else {
                    daftar_pangan.push(item);
                }

                perbarui_tabel();
                perbarui_masukan();
                reset_formulir();
                form.classList.add('hidden');
                tambah_pangan.classList.remove('hidden');
            });

            perbarui_tabel();
        });
    </script>
@endpush