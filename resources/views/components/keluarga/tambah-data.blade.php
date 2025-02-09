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
        name="alamat"
        label="Alamat"
        type="text"
        icon="fa-solid fa-house"
        required="true"
        placeholder="Cth: Jl. Raya"
        autofocus
    />

    <x-input
        name="jumlah_anggota"
        label="Jumlah Anggota"
        type="text"
        icon="fa-solid fa-users"
        required="true"
        placeholder="Cth: 4"
        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
    />

    @php
        $desa_list = App\Models\Desa::all();
    @endphp
    <x-select
        name="keluarga_desa_id"
        label="Desa"
        :options="$desa_list->pluck('nama', 'desa_id')->toArray()"
        required="true"
    />

    <x-radio
        name="ibu_hamil"
        label="Apakah Terdapat Ibu Hamil?"
        :options="['yes' => 'Ya', 'no' => 'Tidak']"
    />

    <x-radio
        name="ibu_menyusui"
        label="Apakah Terdapat Ibu Menyusui?"
        :options="['yes' => 'Ya', 'no' => 'Tidak']"
    />

    <x-radio
        name="balita"
        label="Apakah Terdapat Balita Berumur 0-6 Tahun?"
        :options="['yes' => 'Ya', 'no' => 'Tidak']"
    />
@endcomponent