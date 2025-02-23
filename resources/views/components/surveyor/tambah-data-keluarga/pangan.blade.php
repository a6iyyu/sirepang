<h3 class="mb-6 cursor-default font-bold text-3xl text-primary">
    Masukkan Data Pangan
</h3>
<section id="formSection" class="hidden mb-6">
    <div class="bg-transparent rounded-lg border border-gray-200 p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="w-full">
                <x-select name="nama_jenis" label="Jenis Pangan" :options="$jenis_pangan" required />
            </div>
            <div class="w-full">
                <x-select name="nama_pangan" label="Nama Pangan" :options="[]" required />
            </div>
            <div class="w-full">
                <x-input name="urt" label="Jumlah URT" icon="fa-solid fa-ruler" placeholder="Cth. 1" required />
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <button type="button" id="batalkanPangan"
                class="flex items-center cursor-pointer h-fit rounded-lg px-5 py-2.5 transition-all transform duration-300 ease-in-out bg-green text-gray-700 border border-gray-300 hover:bg-gray-200">
                Kembali
            </button>
            <button type="button" id="simpanPangan"
                class="flex items-center cursor-pointer h-fit rounded-lg px-5 py-2.5 transition-all transform duration-300 ease-in-out bg-green-dark text-white hover:bg-green-700">
                Simpan
            </button>
        </div>
    </div>
</section>

<section class="mt-6">
    <button type="button" id="tambahPangan"
        class="mb-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-2.5 transition-all transform duration-300 ease-in-out bg-green-dark text-white hover:bg-green-700">
        <i class="fa-solid fa-plus"></i>
        Tambah
    </button>

    <div class="overflow-x-auto">
        @include('shared.table.table-form-pangan', [
            'headers' => ['Nama Pangan', 'Jenis Pangan', 'Takaran URT', 'Aksi'],
            'sortable' => ['Nama Pangan'],
            'rows' => [],
        ])
    </div>
</section>

<input type="hidden" id="panganData" name="pangan_data" value="[]">

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const formSection = document.getElementById('formSection');
            const tambahButton = document.getElementById('tambahPangan');
            const batalkanButton = document.getElementById('batalkanPangan');
            const simpanButton = document.getElementById('simpanPangan');
            const jenisPangan = document.querySelector("[name='nama_jenis']");
            const namaPangan = document.querySelector("[name='nama_pangan']");
            const urtInput = document.querySelector("[name='urt']");
            let daftar_pangan = @json($nama_pangan);
            let panganDataInput = document.getElementById('panganData');
            let panganList = [];
            let editingIndex = null;

            function updateTable() {
                const tbody = document.querySelector('tbody');
                tbody.innerHTML = '';

                panganList.forEach((item, index) => {
                    const row = document.createElement('tr');
                    row.classList.add('hover:bg-green-light/30', 'transition-colors', 'duration-200');
                    row.innerHTML = `
                        <td class="w-1/4 px-6 py-4">${item.nama_pangan_text}</td>
                        <td class="w-1/4 px-6 py-4">${item.jenis_pangan_text}</td>
                        <td class="w-1/4 px-6 py-4">${item.urt}</td>
                        <td class="w-1/4 px-6 py-4 flex items-center justify-center">
                            <button onclick="editPangan(${index})" class="text-white bg-blue-500 hover:bg-blue-600 transition-colors rounded-lg p-2">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </td>
                    `;
                    tbody.appendChild(row);
                });
            }

            window.editPangan = function(index) {
                editingIndex = index;
                const item = panganList[index];
                jenisPangan.value = item.jenis_pangan;
                namaPangan.innerHTML =
                    `<option value="${item.nama_pangan}" selected>${item.nama_pangan_text}</option>`;
                urtInput.value = item.urt;
                formSection.classList.remove('hidden');
                tambahButton.classList.add('hidden');
                jenisPangan.focus();
            };

            tambahButton.addEventListener('click', () => {
                editingIndex = null;
                resetForm();
                formSection.classList.remove('hidden');
                tambahButton.classList.add('hidden');
                jenisPangan.focus();
            });

            batalkanButton.addEventListener('click', () => {
                formSection.classList.add('hidden');
                tambahButton.classList.remove('hidden');
                resetForm();
                editingIndex = null;
            });

            jenisPangan.addEventListener("change", () => {
                let selected = jenisPangan.value;
                namaPangan.innerHTML = "<option value='' selected disabled>Pilih Nama Pangan</option>";
                if (daftar_pangan[selected]) {
                    Object.entries(daftar_pangan[selected]).forEach(([id, nama]) => {
                        let option = document.createElement("option");
                        option.value = id;
                        option.textContent = nama;
                        namaPangan.appendChild(option);
                    });
                }
                setTimeout(() => namaPangan.focus(), 10);
            });

            simpanButton.addEventListener("click", (event) => {
                event.preventDefault();
                formSection.classList.remove('hidden');
                if (!jenisPangan.value || !namaPangan.value || !urtInput.value) {
                    alert("Semua bidang harus diisi!");
                    return;
                }

                const newPangan = {
                    jenis_pangan: jenisPangan.value,
                    nama_pangan: namaPangan.value,
                    urt: urtInput.value,
                    jenis_pangan_text: jenisPangan.options[jenisPangan.selectedIndex].text,
                    nama_pangan_text: namaPangan.options[namaPangan.selectedIndex].text
                };

                if (editingIndex !== null) {
                    panganList[editingIndex] = newPangan;
                    editingIndex = null;
                } else {
                    panganList.push(newPangan);
                }

                updateTable();
                updateHiddenInput();
                resetForm();
                formSection.classList.add('hidden');
                tambahButton.classList.remove('hidden');
            });

            function resetForm() {
                jenisPangan.value = '';
                namaPangan.innerHTML = "<option value='' selected disabled>Pilih Nama Pangan</option>";
                urtInput.value = '';
            }

            function updateHiddenInput() {
                panganDataInput.value = JSON.stringify(panganList);
            }

            updateTable();
        });
    </script>
@endpush
