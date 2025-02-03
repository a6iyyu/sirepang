<div class="flex flex-col md:flex-row min-h-screen bg-orange-50">
    {{-- Sidebar --}}
    <div id="sidebar" class="fixed md:fixed w-[240px] bg-emerald-100 shadow-lg flex flex-col py-3 md:py-4 transform -translate-x-full md:translate-x-0 transition-transform duration-300 h-screen z-50 top-0 left-0">
        {{-- Logo --}}
        <div class="px-3 md:px-4 mb-3 md:mb-6 text-center">
            <div class="flex items-center justify-center gap-2">
                <img src="{{ asset('img/logodkp.webp') }}" alt="logo" class="w-12 md:w-16 h-12 md:h-16 rounded-full" />
                <h1 class="text-lg md:text-xl font-bold text-stone-800">SIREPANG</h1>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex flex-col px-2 md:px-3 gap-1.5 flex-grow">
            <a href="{{ route('dasbor') }}" class="flex items-center gap-2 px-3 py-2 bg-stone-800 text-white rounded-lg shadow-md text-xs md:text-sm hover:bg-stone-700">
                <i class="fa-solid fa-gauge-high w-4"></i>
                <span>Dashboard</span>
            </a>

            <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-stone-800 hover:text-white rounded-lg text-xs md:text-sm text-stone-800 transition-colors">
                <i class="fa-solid fa-users w-4"></i>
                <span>Data Keluarga</span>
            </a>
        </nav>

        {{-- Close Sidebar Button Mobile --}}
        <button onclick="toggleSidebar()" class="md:hidden absolute top-2 right-2 text-stone-800 hover:bg-stone-200 p-1.5 rounded-lg transition-colors">
            <i class="fa-solid fa-times text-lg"></i>
        </button>

        {{-- Logout Mobile --}}
        <div class="px-2 md:hidden mt-auto">
            <button onclick="logout()" class="flex items-center justify-center gap-1.5 px-2 py-1.5 rounded-lg border border-red-400 hover:bg-red-400 transition-colors duration-200 group text-xs w-full">
                <i class="fa-solid fa-right-from-bracket text-red-400 group-hover:text-white"></i>
                <span class="text-red-400 group-hover:text-white font-medium">Keluar</span>
            </button>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="flex-1 overflow-x-hidden overflow-y-auto md:ml-[240px]">
        {{-- Header --}}
        <header class="bg-orange-50 sticky top-0 z-40">
            <div class="px-3 md:px-4 py-2 md:py-3">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-1.5 md:gap-0">
                    <div class="flex items-center gap-2">
                        <button onclick="toggleSidebar()" class="md:hidden text-stone-800 hover:bg-stone-100 p-1.5 rounded-lg transition-colors">
                            <i class="fa-solid fa-bars text-lg"></i>
                        </button>
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-stone-800">Selamat Datang</h2>
                            <p class="text-xs md:text-sm text-stone-600">Penyuluh {{ Auth::user()->login_username }}</p>
                        </div>
                    </div>
                    {{-- Logout Desktop --}}
                    <button onclick="logout()" class="hidden md:flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg border border-red-400 hover:bg-red-400 transition-colors duration-200 group text-sm">
                        <i class="fa-solid fa-right-from-bracket text-red-400 group-hover:text-white"></i>
                        <span class="text-red-400 group-hover:text-white font-medium">Keluar</span>
                    </button>
                </div>
            </div>
        </header>

        {{-- Main Content Area --}}
        <main class="p-3 md:p-6">
            <div class="bg-orange-50 rounded-lg p-3 md:p-4">
                <h3 class="text-base md:text-lg font-semibold text-stone-800 mb-3">Riwayat Data</h3>
                {{-- Content goes here --}}
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
