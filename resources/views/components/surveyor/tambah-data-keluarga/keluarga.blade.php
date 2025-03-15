<h3 class="mb-6 cursor-default text-3xl font-bold text-[#2c5e4f]">Masukkan Data Keluarga</h3>
@if ($errors->any())
    <ul class="my-5 list-inside list-disc rounded-lg border border-red-500 bg-red-50 p-4 text-sm text-red-500">
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
    value="{{ old('nama_kepala_keluarga') }}"
    required
/>
<section class="mt-6 flex flex-col justify-between space-y-6 lg:flex-row lg:space-y-0 lg:space-x-6">
    <x-select name="id_desa" label="Desa" :options="$desa" />
    <x-input
        name="alamat"
        label="Alamat"
        icon="fa-solid fa-address-book"
        placeholder="Cth. Perumahan Alasia"
        value="{{ old('alamat') }}"
        required
    />
</section>
<section class="mt-6 flex flex-col justify-between space-y-6 lg:flex-row lg:space-y-0 lg:space-x-6">
    <x-input
        name="jumlah_keluarga"
        label="Jumlah Anggota"
        info="*Termasuk Kepala Keluarga"
        icon="fa-solid fa-address-book"
        type="number"
        placeholder="Cth. 18"
        value="{{ old('jumlah_keluarga') }}"
        required
    />
    <x-select name="range_pendapatan" label="Pendapatan Keluarga" :options="$rentang_uang" />
    <x-select name="range_pengeluaran" label="Pengeluaran Keluarga" :options="$rentang_uang" />
</section>
<section class="mt-6 flex flex-col justify-between space-y-6 lg:flex-row lg:space-y-0 lg:space-x-6">
    <x-radio
        name="is_hamil"
        label="Apakah Ada Ibu Hamil?"
        :options="[
            'Ya' => 'Ya',
            'Tidak' => 'Tidak',
        ]"
    />
    <x-radio
        name="is_menyusui"
        label="Apakah Terdapat Ibu Menyusui?"
        :options="[
            'Ya' => 'Ya',
            'Tidak' => 'Tidak',
        ]"
    />
    <x-radio
        name="is_balita"
        label="Apakah Terdapat Balita 0 - 6 Tahun?"
        :options="[
            'Ya' => 'Ya',
            'Tidak' => 'Tidak',
        ]"
    />
</section>