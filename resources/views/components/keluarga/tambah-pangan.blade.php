@component('shared.form.modal', [
    'id_modal' => 'tambah_data_keluarga',
    'title' => 'Tambah Data Keluarga',
])
    <x-input
        name="Nama_Makanan"
        label="Nama Makanan"
        type="text"
        icon="fa-solid fa-food"
        required="true"
        placeholder="Cth: Sayuran"
        oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')"
        autofocus
    />

    <x-input
        name="Porsi_Makanan"
        label="Porsi Makanan"
        type="text"
        icon="fa-solid fa-amount"
        required="true"
        placeholder="Cth: 12 Centong"
        autofocus
    />

@endcomponent