<section class="mt-8 cursor-default grid grid-cols-1 gap-4 lg:grid-cols-3">
    <div class="bg-green-dark overflow-hidden p-4 rounded-xl relative text-white lg:p-6">
        <h3 class="mb-2 opacity-80 text-sm lg:text-lg">Jumlah Kecamatan</h3>
        <h5 class="relative z-10 text-2xl font-bold lg:text-4xl">
            {{ $jumlah_desa }}
        </h5>
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-green-medium rounded-full opacity-30"></div>
    </div>
    <div class="bg-green-medium overflow-hidden p-4 rounded-xl relative text-white lg:p-6">
        <h3 class="mb-2 opacity-80 text-sm lg:text-lg">Jumlah Keluarga</h3>
        <h5 class="relative z-10 text-2xl font-bold lg:text-4xl">
            {{ $jumlah_keluarga }}
        </h5>
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-green-dark rounded-full opacity-30"></div>
    </div>
    <div class="bg-green-medium overflow-hidden p-4 rounded-xl relative text-white lg:p-6">
        <h3 class="mb-2 opacity-80 text-sm lg:text-lg">Jumlah Desa</h3>
        <h5 class="relative z-10 text-2xl font-bold lg:text-4xl">
            {{ $jumlah_keluarga }}
        </h5>
        <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-green-dark rounded-full opacity-30"></div>
    </div>
</section>