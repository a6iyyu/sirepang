@component('shared.form.modal', [
    'id_modal' => 'tambah_data_keluarga',
    'title' => 'Tambah Data Keluarga',
])
    <x-input
        name="nama_kepala_keluarga"
        label="Nama Kepala Keluarga"
        type="text"
        icon="fa-solid fa-user"
        required="true"
        placeholder="Cth: Agus Miftah"
        oninput="this.value = this.value.replace(/[^a-zA-Z]/g, '')"
        autofocus
    />
    <x-input
        name="umur"
        label="Umur"
        type="text"
        icon="fa-solid fa-list-ol"
        required="true"
        placeholder="Cth: 30"
        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
        autofocus
    />
@endcomponent