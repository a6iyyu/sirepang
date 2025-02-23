    document.addEventListener("DOMContentLoaded", () => {
        const formSection = document.getElementById('formSection');
        const tambahButton = document.getElementById('tambahPangan');
        const batalkanButton = document.getElementById('batalkanPangan');
        const simpanButton = document.getElementById('simpanPangan');
        const jenisPangan = document.querySelector("[name='nama_jenis']");
        const namaPangan = document.querySelector("[name='nama_pangan']");
        let daftar_pangan = @json($nama_pangan);
        let panganDataInput = document.getElementById('panganData');
        let panganList = [];
        let editingIndex = null; // Track the index of the item being edited

        // Function to update the table with evenly spaced values and edit button
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
                    <td class="w-1/4 px-6 py-4 text-center">
                        <button onclick="editPangan(${index})" class="text-white bg-blue-500 hover:bg-blue-600 transition-colors rounded-lg p-2">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // Function to handle editing a pangan item
        window.editPangan = function(index) {
            editingIndex = index; // Store the index of the item being edited
            const item = panganList[index];
            // Populate the form with the item's data for editing
            document.querySelector("[name='nama_jenis']").value = item.jenis_pangan;
            document.querySelector("[name='nama_pangan']").innerHTML = `<option value="${item.nama_pangan}" selected>${item.nama_pangan_text}</option>`;
            document.querySelector("[name='urt']").value = item.urt;

            // Show the form and hide the "Tambah" button
            formSection.classList.remove('hidden');
            tambahButton.classList.add('hidden');
        };

        tambahButton.addEventListener('click', () => {
            // Reset editing state when adding a new item
            editingIndex = null;
            resetForm();
            formSection.classList.remove('hidden');
            tambahButton.classList.add('hidden');
        });

        batalkanButton.addEventListener('click', () => {
            formSection.classList.add('hidden');
            tambahButton.classList.remove('hidden');
            resetForm();
            editingIndex = null; // Clear editing state
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
        });

        simpanButton.addEventListener('click', () => {
            const jenisPanganSelect = document.querySelector("[name='nama_jenis']");
            const namaPanganSelect = document.querySelector("[name='nama_pangan']");
            const urtInput = document.querySelector("[name='urt']");

            if (!jenisPanganSelect.value || !namaPanganSelect.value || !urtInput.value) {
                alert('Semua field harus diisi!');
                return;
            }

            const newPangan = {
                jenis_pangan: jenisPanganSelect.value,
                nama_pangan: namaPanganSelect.value,
                urt: urtInput.value,
                jenis_pangan_text: jenisPanganSelect.options[jenisPanganSelect.selectedIndex].text,
                nama_pangan_text: namaPanganSelect.options[namaPanganSelect.selectedIndex].text
            };

            if (editingIndex !== null) {
                // Update the existing item in panganList
                panganList[editingIndex] = newPangan;
                editingIndex = null; // Reset editing state
            } else {
                // Add a new item to panganList
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
            document.querySelector("[name='urt']").value = '';
        }

        function updateHiddenInput() {
            panganDataInput.value = JSON.stringify(panganList);
        }

        // Initialize the table with any existing data
        updateTable();
    });

