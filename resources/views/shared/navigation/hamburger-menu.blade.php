<i id="hamburger-menu" class="fa-solid fa-bars bg-green-dark fixed top-10 right-10 z-20 flex cursor-pointer rounded-lg p-2 text-xl text-white transition-opacity duration-300 lg:!hidden"></i>
<aside id="mobile" class="bg-green-dark fixed top-0 left-0 z-30 flex h-full min-h-screen w-80 -translate-x-full transform flex-col rounded-r-2xl p-6 shadow-2xl transition-transform duration-300 ease-in-out">
    <section class="flex justify-between">
        <div class="flex cursor-default items-center space-x-4">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="h-12 w-12 object-cover" />
            <span id="mobile-sidebar-menu">
                <h5 class="text-xl font-bold tracking-tight text-white">SIREPANG</h5>
                <h6 class="text-sm text-white italic">Sistem Recall Pangan</h6>
            </span>
        </div>
        <i id="mobile-close" class="fa-solid fa-xmark mt-1.5 ml-4 h-fit cursor-pointer text-lg text-white"></i>
    </section>
    <hr class="mt-4 h-0.5 w-full text-emerald-800" />
    <nav class="mt-4 flex h-full flex-1 flex-col justify-between text-sm">
        <div class="scrollbar-thin scrollbar-thumb-slate-400 scrollbar-track-transparent w-full flex flex-col space-y-4 overflow-y-auto" style="max-height: calc(100vh - 200px)">
            @if (Auth::check() && Auth::user()->tipe == 'kader')
                <a
                    id="route"
                    href="{{ route('penyuluh') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('dasbor') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-gauge-high"></i>
                    <h5 id="sidebar-menu" class="ml-4">Dasbor</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('keluarga') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('keluarga', 'keluarga/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-users"></i>
                    <h5 id="sidebar-menu" class="ml-4">Keluarga</h5>
                </a>
            @endif
            @if (Auth::check() && Auth::user()->tipe == 'admin')
                <a
                    id="route"
                    href="{{ route('admin') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-user-shield"></i>
                    <h5 id="sidebar-menu" class="ml-4">Dasbor</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('data-kecamatan') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/data-kecamatan', 'admin/data-kecamatan/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-map"></i>
                    <h5 id="sidebar-menu" class="ml-4">Data Kecamatan</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('kelola-surveyor') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/kelola-surveyor', 'admin/kelola-surveyor/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-user-group"></i>
                    <h5 id="sidebar-menu" class="ml-4">Kelola Surveyor</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('rekap-pangan') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/rekap-pangan', 'admin/rekap-pangan/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-bowl-rice"></i>
                    <h5 id="sidebar-menu" class="ml-4">Rekap Pangan</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('rekap-pph') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/rekap-pph') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-bar-chart"></i>
                    <h5 id="sidebar-menu" class="ml-4">Rekap PPH</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('verifikasi-data') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/verifikasi-data', 'admin/verifikasi-data/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-50/25 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-check-double"></i>
                    <h5 id="sidebar-menu" class="ml-4">Verifikasi Data</h5>
                </a>
            @endif
        </div>
        <div class="mt-auto pt-4">
            <a
                id="route"
                href="{{ route('keluar') }}"
                class="flex h-fit w-full transform cursor-pointer items-center justify-center rounded-xl border-2 border-slate-100/75 bg-red-500 px-4 py-3 text-sm text-white transition-all duration-300 ease-in-out lg:mt-0 lg:px-5 lg:py-3 lg:hover:bg-red-600"
            >
                <i class="fa-solid fa-right-to-bracket mr-2"></i>
                <h5 id="sidebar-menu" class="ml-4">Keluar</h5>
            </a>
        </div>
    </nav>
</aside>