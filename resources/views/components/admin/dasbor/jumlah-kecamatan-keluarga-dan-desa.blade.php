<section class="mt-8 grid cursor-default grid-cols-1 gap-4 lg:grid-cols-3">
    <div class="bg-green-medium relative overflow-hidden rounded-xl p-4 text-white lg:p-6">
        <h3 class="mb-2 text-sm opacity-80 lg:text-lg">Jumlah Desa</h3>
        <h5 class="relative z-10 text-2xl font-bold lg:text-4xl">
            {{ $jumlah_desa }}
        </h5>
        <div class="bg-green-dark absolute -right-4 -bottom-4 h-24 w-24 rounded-full opacity-30"></div>
    </div>
    <div class="bg-green-dark relative overflow-hidden rounded-xl p-4 text-white lg:p-6">
        <h3 class="mb-2 text-sm opacity-80 lg:text-lg">Jumlah Kecamatan</h3>
        <h5 class="relative z-10 text-2xl font-bold lg:text-4xl">
            {{ $jumlah_kecamatan }}
        </h5>
        <div class="bg-green-medium absolute -right-4 -bottom-4 h-24 w-24 rounded-full opacity-30"></div>
    </div>
    <div class="bg-green-medium relative overflow-hidden rounded-xl p-4 text-white lg:p-6">
        <h3 class="mb-2 text-sm opacity-80 lg:text-lg">Jumlah Keluarga</h3>
        <h5 class="relative z-10 text-2xl font-bold lg:text-4xl">
            {{ $jumlah_keluarga }}
        </h5>
        <div class="bg-green-dark absolute -right-4 -bottom-4 h-24 w-24 rounded-full opacity-30"></div>
    </div>
</section>