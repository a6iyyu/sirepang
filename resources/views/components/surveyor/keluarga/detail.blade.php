<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<div x-data="{ open: true }" class="container w-full mx-auto py-6">
    <div class="card rounded-xl overflow-hidden shadow-xl bg-transparent border-0">
        <!-- Header with darker gradient -->
        <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 p-5 flex justify-between items-center">
            <h4 class="text-white text-xl font-bold mb-0">Data Keluarga</h4>
            <button @click="open = !open" class="text-white text-xl">
                <span x-show="open">&#x25BC;</span> <!-- Down arrow -->
                <span x-show="!open">&#x25B6;</span> <!-- Right arrow -->
            </button>
        </div>

        <!-- Main content -->
        <div x-show="open" class="divide-y divide-gray-100">
            <!-- Nama -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Nama</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->nama_kepala_keluarga }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Anggota Keluarga -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Anggota Keluarga</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->jumlah_keluarga }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Alamat -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Alamat</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->alamat }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Pendapatan -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Pendapatan</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">Rp {{ $pendapatan }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Pengeluaran -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Pengeluaran</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">Rp {{ $pengeluaran }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Ibu Hamil -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Ibu Hamil</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->is_hamil }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Ibu Menyusui -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Ibu Menyusui</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->is_menyusui }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Balita -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Balita</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->is_balita }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="my-6"></div>
    <div x-data="{ open: true }" class="card rounded-xl overflow-hidden shadow-xl bg-transparent border-0">
        <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 p-5 flex justify-between items-center">
            <h4 class="text-white text-xl font-bold mb-0">Pangan Keluarga</h4>
            <button @click="open = !open" class="text-white text-xl">
                <span x-show="open">&#x25BC;</span> <!-- Down arrow -->
                <span x-show="!open">&#x25B6;</span> <!-- Right arrow -->
            </button>
        </div>
        <div x-show="open">
            <!-- Pangan Keluarga -->
            <div class="grid grid-cols-1 md:grid-cols-3 hover:bg-emerald-50/50 transition-all duration-200 text-center">
                <div class="p-4 md:p-5 flex items-center justify-center">
                    <span class="text-emerald-800 font-medium text-base">Jenis Pangan</span>
                </div>
                <div class="p-4 md:p-5 flex items-center justify-center">
                    <span class="text-emerald-800 font-medium text-base">Nama Pangan</span>
                </div>
                <div class="p-4 md:p-5 flex items-center justify-center">
                    <span class="text-emerald-800 font-medium text-base">URT</span>
                </div>
            </div>
            <div class="h-1 bg-emerald-700 rounded-full"></div>

            @if (isset($keluarga) && isset($pangan_detail) && count($pangan_detail) > 0)
                @foreach ($pangan_detail as $pangan)
                    <div class="grid grid-cols-1 md:grid-cols-3 hover:bg-emerald-50/50 transition-all duration-200">
                        <div class="p-4 md:p-5 text-gray-800 flex justify-center items-center">
                            <span class="font-medium">{{ $pangan->jenis_pangan }}</span>
                        </div>
                        <div class="p-4 md:p-5 text-gray-800 flex justify-center items-center">
                            <span class="font-medium">{{ $pangan->nama_pangan }}</span>
                        </div>
                        <div class="p-4 md:p-5 text-gray-800 flex justify-center items-center">
                            <span class="font-medium">{{ $pangan->urt }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 hover:bg-emerald-50/50 transition-all duration-200">
                    <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                        <span class="text-gray-400">—</span>
                    </div>
                    <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                        <span class="text-gray-400">—</span>
                    </div>
                    <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                        <span class="text-gray-400">—</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
