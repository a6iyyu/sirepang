<div class="flex flex-col md:flex-row min-h-screen bg-green-50">
    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed md:sticky w-64 bg-green-50   flex flex-col py-6 transform -translate-x-full md:translate-x-0 transition-transform duration-300 h-screen z-50 top-0 left-0 ">
        <div class="px-6 mb-8 text-center">
            <div class="flex items-center justify-center gap-3">
                <img src="{{ asset('img/logodkp.webp') }}" alt="logo"
                    class="w-16 h-16 rounded-full ring-2 ring-amber-300 object-cover shadow-sm" />
                <h1 class="text-2xl font-bold text-stone-800 tracking-tight">SIREPANG</h1>
            </div>
        </div>
        <nav class="flex flex-col px-4 space-y-2 flex-grow">
            <a href="{{ route('dasbor') }}"
                class="flex items-center gap-3 px-4 py-3 bg-green-100 text-stone-700 rounded-xl font-medium hover:bg-green-200 transition-colors">
                <i class="fa-solid fa-gauge-high w-5 text-stone-700"></i>
                <span>Dashboard</span>
            </a>
            <a href="#"
                class="flex items-center gap-3 px-4 py-3 text-stone-700 rounded-xl hover:bg-green-100 transition-colors">
                <i class="fa-solid fa-users w-5 text-stone-700"></i>
                <span>Data Keluarga</span>
            </a>
        </nav>
        <button onclick="toggleSidebar()"
            class="md:hidden absolute top-4 right-4 text-green-800 hover:bg-green-100 p-2 rounded-xl transition-colors">
            <i class="fa-solid fa-times text-xl"></i>
        </button>
        <div class="px-4 md:hidden mt-auto">
            <button onclick="logout()"
                class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-red-500 text-white hover:bg-red-600 transition-colors duration-200 text-sm w-full">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar</span>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-x-hidden overflow-y-auto md:ml-0 mt-5.5">
        <div class="px-6 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-center md:text-left">
                <h2 class="text-4xl font-bold text-stone-700">
                    Selamat Datang
                </h2>
                <p class="text-2xl font-medium text-stone-700 mt-1">{{ Auth::user()->login_username }}</p>
            </div>
            <div class="hidden md:block">
                <button onclick="logout()"
                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-500 text-white hover:bg-red-600 transition-colors duration-200">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Keluar</span>
                </button>
            </div>
        </div>

        <!-- Stats -->
        <main class="p-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-green-200 p-6 rounded-2xl border-2 border-green-200 shadow-xs">
                        <h3 class="text-lg font-semibold text-stone-700 mb-3">Jumlah Desa</h3>
                        <div class="text-4xl font-bold text-stone-700">{{ $jumlahDesa }}</div>
                    </div>
                    <div class="bg-green-200 p-6 rounded-2xl border-2 border-green-200 shadow-xs">
                        <h3 class="text-lg font-semibold text-stone-700 mb-3">Jumlah Keluarga</h3>
                        <div class="text-4xl font-bold text-stone-700">{{ $jumlahKeluarga }}</div>
                    </div>

                    <!-- Riwayat Data -->
                    <div class="bg-green-200 p-6 rounded-2xl border-2 border-green-200 md:col-span-2 shadow-xs">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-stone-700">Riwayat Data</h3>
                            <button class="text-sm text-amber-600 hover:text-amber-700 flex items-center gap-2">
                                <i class="fa-solid fa-arrows-rotate"></i>
                                Segarkan Data
                            </button>
                        </div>
                        <div class="border-t border-green-600 pt-4">
                            <!-- tabel guis -->
                            <div class="text-center text-stone-700 py-8">
                                <i class="fa-regular fa-folder-open text-3xl mb-2"></i>
                                <p>Belum ada data tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    function logout() {
        window.location = "{{ route('logout') }}";
    }
</script>
