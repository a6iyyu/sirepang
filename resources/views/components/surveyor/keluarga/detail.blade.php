<div class="container w-full mx-auto py-6">
    <div class="card rounded-xl overflow-hidden shadow-xl bg-transparent border-0">
        <!-- Header with darker gradient -->
        <div class="bg-gradient-to-r from-emerald-800 to-emerald-600 p-5">
            <h4 class="text-white text-xl font-bold mb-0">Data Keluarga</h4>
        </div>

        <!-- Main content -->
        <div class="divide-y divide-gray-100">
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
                        <span class="font-medium">{{ $keluarga->anggota_keluarga }}</span>
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
                    <span class="font-medium">Rp {{($keluarga->rentang_pendapatan) }}</span>
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
                        <span class="font-medium">Rp {{ number_format($keluarga->pengeluaran, 0, ',', '.') }}</span>
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
                        @if($keluarga->is_ibu_hamil)
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-4 py-1.5 rounded-full">Ya</span>
                        @else
                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-4 py-1.5 rounded-full">Tidak</span>
                        @endif
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
                        @if($keluarga->is_ibu_menyusui)
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-4 py-1.5 rounded-full">Ya</span>
                        @else
                            <span class="bg-gray-100 text-gray-700 text-xs font-medium px-4 py-1.5 rounded-full">Tidak</span>
                        @endif
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

            <!-- Jenis Pangan -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Jenis Pangan</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->pangan }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- Nama Pangan -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">Nama Pangan</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->pangan }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>

            <!-- URT -->
            <div class="grid grid-cols-1 md:grid-cols-2 hover:bg-emerald-50/50 transition-all duration-200">
                <div class="p-4 md:p-5 flex items-center">
                    <div class="w-1.5 h-12 bg-emerald-700 mr-4 rounded-full"></div>
                    <span class="text-emerald-800 font-medium text-base">URT</span>
                </div>
                <div class="p-4 md:p-5 md:text-right text-gray-800 flex md:justify-end items-center">
                    @if (isset($keluarga))
                        <span class="font-medium">{{ $keluarga->pangan }}</span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
