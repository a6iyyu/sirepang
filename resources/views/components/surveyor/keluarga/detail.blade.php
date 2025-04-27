<section x-data="{ open: true }" class="mt-6 cursor-default overflow-hidden rounded-xl border-0 shadow-xl">
    <div class="flex items-center justify-between bg-gradient-to-r from-emerald-800 to-emerald-600 px-7 py-5">
        <h4 class="mb-0 text-xl font-bold text-white">Data Keluarga</h4>
        <button @click="open = !open" class="text-xl text-white">
            <i x-show="open" class="fa-solid fa-chevron-down cursor-pointer"></i>
            <i x-show="!open" class="fa-solid fa-chevron-right cursor-pointer"></i>
        </button>
    </div>
    <article x-show="open" class="divide-y divide-gray-100">
        <x-data name="Nama Kepala Keluarga" :value="$keluarga->nama_kepala_keluarga" />
        <x-data name="Jumlah Anggota" :value="$keluarga->jumlah_keluarga" />
        <x-data name="Desa" :value="$keluarga->desa->nama_desa" />
        <x-data name="Alamat" :value="$keluarga->alamat" />
        <x-data name="Pendapatan" :value="$pendapatan" />
        <x-data name="Pengeluaran" :value="$pengeluaran" />
        <x-data name="Ibu Hamil" :value="$keluarga->is_hamil" />
        <x-data name="Ibu Menyusui" :value="$keluarga->is_menyusui" />
        <x-data name="Balita" :value="$keluarga->is_balita" />
    </article>
</section>
<section x-data="{ open: true }" class="mt-6 overflow-hidden rounded-xl border-0 bg-transparent shadow-xl">
    <div class="flex items-center justify-between bg-gradient-to-r from-emerald-800 to-emerald-600 px-7 py-5">
        <h4 class="mb-0 text-xl font-bold text-white">Dokumentasi</h4>
        <button @click="open = !open" class="text-xl text-white">
            <i x-show="open" class="fa-solid fa-chevron-down cursor-pointer"></i>
            <i x-show="!open" class="fa-solid fa-chevron-right cursor-pointer"></i>
        </button>
    </div>
    <article x-show="open" class="cursor-default overflow-x-auto">
        <img
            src="data:image/jpeg;base64,{{ $keluarga->gambar }}"
            alt="{{ "Dokumentasi dari keluarga $keluarga->nama_kepala_keluarga." }}"
            class="h-96 w-full object-cover"    
        />
    </article>
</section>
<section x-data="{ open: true }" class="mt-6 overflow-hidden rounded-xl border-0 bg-transparent shadow-xl">
    <div class="flex items-center justify-between bg-gradient-to-r from-emerald-800 to-emerald-600 px-7 py-5">
        <h4 class="mb-0 text-xl font-bold text-white">Pangan Keluarga</h4>
        <button @click="open = !open" class="text-xl text-white">
            <i x-show="open" class="fa-solid fa-chevron-down cursor-pointer"></i>
            <i x-show="!open" class="fa-solid fa-chevron-right cursor-pointer"></i>
        </button>
    </div>
    <article x-show="open" class="cursor-default overflow-x-auto">
        <div class="min-w-[600px]">
            <span class="grid grid-cols-2 p-4 text-center text-base font-medium text-emerald-800 transition-all duration-200 lg:hover:bg-emerald-50/50">
                <h5 class="flex items-center justify-center font-bold">Nama Pangan</h5>
                <h5 class="flex items-center justify-center font-bold">Takaran URT</h5>
            </span>
            <hr class="h-0.5 rounded-full bg-emerald-700" />
            @if (isset($keluarga) && isset($pangan_detail) && count($pangan_detail) > 0)
                @foreach ($pangan_detail as $pangan)
                    <div class="grid grid-cols-2 p-4 text-center font-medium text-gray-800 transition-all duration-200 lg:hover:bg-emerald-50/50">
                        <h5 class="flex items-center justify-center">
                            {{ $pangan->nama_pangan }}
                        </h5>
                        <h5 class="flex items-center justify-center">
                            {{ $pangan->urt }} ({{ $pangan->takaran->nama_takaran }})
                        </h5>
                    </div>
                @endforeach
            @else
                <div class="grid grid-cols-1 transition-all duration-200 md:grid-cols-3 lg:hover:bg-emerald-50/50">
                    <h5 class="flex items-center p-4 text-gray-400 md:justify-end md:p-5 md:text-right">—</h5>
                    <h5 class="flex items-center p-4 text-gray-400 md:justify-end md:p-5 md:text-right">—</h5>
                </div>
            @endif
        </div>
    </article>
</section>