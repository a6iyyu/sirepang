<aside class="bg-green-dark fixed z-30 hidden h-full flex-col space-y-4 rounded-r-2xl p-6 shadow-2xl transition-all duration-300 ease-in-out lg:flex">
    <section class="flex space-x-8">
        <div class="flex cursor-default items-center space-x-4">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" id="logo" class="h-12 w-12 object-cover" />
            <span id="sidebar-menu">
                <h5 class="text-xl font-bold tracking-tight text-white">SIREPANG</h5>
                <h6 class="text-sm text-white italic">Sistem Rekam Pangan</h6>
            </span>
        </div>
        <i id="close" class="fa-solid fa-xmark mt-1.5 h-fit cursor-pointer text-lg text-white"></i>
    </section>
    <i id="open" class="fa-solid fa-bars !hidden cursor-pointer text-center text-xl text-white"></i>
    <hr class="mt-2 h-0.5 w-full text-emerald-800" />
    <nav class="flex h-full flex-1 flex-col justify-between text-sm">
        <div class="space-y-4 overflow-y-auto pr-2 scrollbar-thin scrollbar-thumb-slate-400 scrollbar-track-transparent" style="max-height: calc(100vh - 200px)">
            @if (Auth::check() && Auth::user()->tipe == 'kader')
                <a
                    id="route"
                    href="{{ route('penyuluh') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('dasbor') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-gauge-high"></i>
                    <h5 id="sidebar-menu" class="ml-4">Dasbor</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('keluarga') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('keluarga', 'keluarga/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-users"></i>
                    <h5 id="sidebar-menu" class="ml-4">Keluarga</h5>
                </a>
            @endif
            @if (Auth::check() && Auth::user()->tipe == 'admin')
                <a
                    id="route"
                    href="{{ route('admin') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-user-shield"></i>
                    <h5 id="sidebar-menu" class="ml-4">Dasbor</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('data-kecamatan') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/data-kecamatan', 'admin/data-kecamatan/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-map"></i>
                    <h5 id="sidebar-menu" class="ml-4">Data Kecamatan</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('kelola-surveyor') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/kelola-surveyor', 'admin/kelola-surveyor/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-user-group"></i>
                    <h5 id="sidebar-menu" class="ml-4">Kelola Surveyor</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('rekap-pangan') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/rekap-pangan', 'admin/rekap-pangan/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-bowl-rice"></i>
                    <h5 id="sidebar-menu" class="ml-4">Rekap Pangan</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('rekap-pph') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/rekap-pph') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
                >
                    <i class="fa-solid fa-bar-chart"></i>
                    <h5 id="sidebar-menu" class="ml-4">Rekap PPH</h5>
                </a>
                <a
                    id="route"
                    href="{{ route('verifikasi-data') }}"
                    class="{{ 'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::is('admin/verifikasi-data', 'admin/verifikasi-data/detail/*') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md') }}"
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
                class="flex w-full items-center justify-center cursor-pointer h-fit rounded-xl px-4 py-3 text-sm transition-all transform duration-300 ease-in-out border-2 border-slate-100/75 bg-red-500 text-white lg:mt-0 lg:px-5 lg:py-3 lg:hover:bg-red-600"
            >
                <i class="fa-solid fa-right-to-bracket mr-2"></i>
                <h5 id="sidebar-menu" class="ml-4">Keluar</h5>
            </a>
        </div>
    </nav>
</aside>