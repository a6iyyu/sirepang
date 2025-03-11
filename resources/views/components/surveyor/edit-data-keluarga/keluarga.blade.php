<h3 class="mb-6 cursor-default font-bold text-3xl text-[#2c5e4f]">
    Masukkan Data Keluarga
</h3>
@if ($errors->any())
    <ul class="my-5 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<x-input
    name="nama_kepala_keluarga"
    label="Nama Kepala Keluarga"
    icon="fa-solid fa-user"
    placeholder="Cth. Agus Miftah"
    :value="old('nama_kepala_keluarga', $keluarga->nama_kepala_keluarga)"
    required
/>
<section class="mt-6 space-y-6 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
    <x-select
        name="id_desa"
        label="Desa"
        :options="$desa"
        :value="old('id_desa', $keluarga->id_desa)"
    />
    <x-input
        name="alamat"
        label="Alamat"
        icon="fa-solid fa-address-book"
        placeholder="Cth. Perumahan Alasia"
        :value="old('alamat', $keluarga->alamat)"
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
        :value="old('jumlah_keluarga', $keluarga->jumlah_keluarga)"
        required
    />
    <x-select
        name="range_pendapatan"
        label="Pendapatan Keluarga"
        :options="$rentang_uang"
        :value="old('rentang_pendapatan', $keluarga->rentang_pendapatan)"
    />
    <x-select
        name="range_pengeluaran"
        label="Pengeluaran Keluarga"
        :options="$rentang_uang"
        :value="old('rentang_pengeluaran', $keluarga->rentang_pengeluaran)"
    />
</section>
<section class="mt-6 space-y-6 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
    <x-radio
        name="is_hamil"
        label="Apakah Ada Ibu Hamil?"
        :options="[
            'Ya' => 'Ya',
            'Tidak' => 'Tidak',
        ]"
        :value="old('is_hamil', $keluarga->is_hamil)"
    />
    <x-radio
        name="is_menyusui"
        label="Apakah Terdapat Ibu Menyusui?"
        :options="[
            'Ya' => 'Ya',
            'Tidak' => 'Tidak',
        ]"
        :value="old('is_menyusui', $keluarga->is_menyusui)"
    />
    <x-radio
        name="is_balita"
        label="Apakah Terdapat Balita 0 - 6 Tahun?"
        :options="[
            'Ya' => 'Ya',
            'Tidak' => 'Tidak',
        ]"
        :value="old('is_balita', $keluarga->is_balita)"
    />
</section>