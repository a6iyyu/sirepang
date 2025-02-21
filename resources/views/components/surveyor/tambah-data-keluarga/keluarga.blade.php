<h3 class="mb-6 cursor-default font-bold text-3xl text-[#2c5e4f]">
    Masukkan Data Keluarga
</h3>
<x-input
    name="nama_kepala_keluarga"
    label="Nama Kepala Keluarga"
    icon="fa-solid fa-user"
    placeholder="Cth. Agus Miftah"
    autofocus
    required
/>
<section class="mt-6 space-y-6 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
    <x-select
        name="nama_desa"
        label="Desa"
        :options="$desa"
        required
    />
    <x-input
        name="alamat"
        label="Alamat"
        icon="fa-solid fa-address-book"
        placeholder="Cth. Perumahan Alasia"
        required
    />
</section>
<section class="mt-6 space-y-6 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
    <x-input
        name="jumlah_keluarga"
        label="Jumlah Anggota"
        info="*Termasuk Kepala Keluarga"
        icon="fa-solid fa-address-book"
        type="number"
        placeholder="Cth. 18"
        required
    />
    <x-select
        name="range_pendapatan"
        label="Pendapatan Keluarga"
        :options="$range_pendapatan"
        required
    />
    <x-select
        name="range_pengeluaran"
        label="Pengeluaran Keluarga"
        :options="$range_pengeluaran"
        required
    />
</section>
<section class="mt-6 space-y-6 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
    <x-radio
        name="is_hamil"
        label="Apakah Ada Ibu Hamil?"
        :options="[
            '1' => 'Ya',
            '0' => 'Tidak',
        ]"
        required
    />
    <x-radio
        name="is_menyusui"
        label="Apakah Terdapat Ibu Menyusui?"
        :options="[
            '1' => 'Ya',
            '0' => 'Tidak',
        ]"
        required=""
    />
    <x-radio
        name="is_balita"
        label="Apakah Terdapat Balita 0 - 6 Tahun?"
        :options="[
            '1' => 'Ya',
            '0' => 'Tidak',
        ]"
    />
</section>