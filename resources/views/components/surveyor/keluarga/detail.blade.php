<section x-data="{ open: true }" class="cursor-default rounded-xl overflow-hidden shadow-xl border-0">
    <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-7 py-5 flex justify-between items-center">
        <h4 class="text-white text-xl font-bold mb-0">Data Keluarga</h4>
        <button @click="open = !open" class="text-white text-xl">
            <i x-show="open" class="fa-solid fa-chevron-down cursor-pointer"></i>
            <i x-show="!open" class="fa-solid fa-chevron-right cursor-pointer"></i>
        </button>
    </div>
    <article x-show="open" class="divide-y divide-gray-100">
        <x-data name="Nama" :value="$keluarga->nama_kepala_keluarga" />
        <x-data name="Anggota Keluarga" :value="$keluarga->jumlah_keluarga" />
        <x-data name="Alamat" :value="$keluarga->alamat" />
        <x-data name="Pendapatan" :value="$pendapatan" />
        <x-data name="Pengeluaran" :value="$pengeluaran" />
        <x-data name="Ibu Hamil" :value="$keluarga->is_hamil" />
        <x-data name="Ibu Menyusui" :value="$keluarga->is_menyusui" />
        <x-data name="Balita" :value="$keluarga->is_balita" />
    </article>
</section>
<section x-data="{ open: true }" class="mt-6 rounded-xl overflow-hidden shadow-xl bg-transparent border-0">
    <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 px-7 py-5 flex justify-between items-center">
        <h4 class="text-white text-xl font-bold mb-0">Pangan Keluarga</h4>
        <button @click="open = !open" class="text-white text-xl">
            <i x-show="open" class="fa-solid fa-chevron-down cursor-pointer"></i>
            <i x-show="!open" class="fa-solid fa-chevron-right cursor-pointer"></i>
        </button>
    </div>
    <article x-show="open" class="cursor-default">
        <div class="grid grid-cols-3 text-center font-medium text-base text-emerald-800 p-4 transition-all duration-200 lg:hover:bg-emerald-50/50">
            <h5 class="flex items-center justify-center font-bold">
                Jenis Pangan
            </h5>
            <h5 class="flex items-center justify-center font-bold">
                Nama Pangan
            </h5>
            <h5 class="flex items-center justify-center font-bold">
                Takaran URT
            </h5>
        </div>
        <hr class="h-0.5 bg-emerald-700 rounded-full" />
        @if (isset($keluarga) && isset($pangan_detail) && count($pangan_detail) > 0)
            @foreach ($pangan_detail as $pangan)
                <div class="grid grid-cols-3 font-medium p-4 text-gray-800 transition-all duration-200 lg:hover:bg-emerald-50/50">
                    <h5 class="flex items-center justify-center">
                        {{ $pangan->jenis_pangan }}
                    </h5>
                    <h5 class="flex items-center justify-center">
                        {{ $pangan->nama_pangan }}
                    </h5>
                    <h5 class="flex items-center justify-center">
                        {{ $pangan->urt }} {{ $pangan->takaran }}
                    </h5>
                </div>
            @endforeach
        @else
            <div class="grid grid-cols-1 transition-all duration-200 lg:hover:bg-emerald-50/50 md:grid-cols-3">
                <h5 class="flex items-center text-gray-400 md:justify-end p-4 md:p-5 md:text-right">
                    —
                </h5>
                <h5 class="flex items-center text-gray-400 md:justify-end p-4 md:p-5 md:text-right">
                    —
                </h5>
                <h5 class="flex items-center text-gray-400 md:justify-end p-4 md:p-5 md:text-right">
                    —
                </h5>
            </div>
        @endif
    </article>
</section>
