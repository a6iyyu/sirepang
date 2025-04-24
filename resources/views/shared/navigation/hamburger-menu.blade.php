<i id="hamburger-menu" class="fa-solid fa-bars bg-green-dark fixed top-10 right-10 z-20 flex cursor-pointer rounded-lg p-2 text-xl text-white transition-opacity duration-300 lg:!hidden"></i>
<aside id="mobile" class="bg-green-dark fixed top-0 left-0 z-30 flex h-full min-h-screen w-80 -translate-x-full transform flex-col rounded-r-2xl p-6 shadow-2xl transition-transform duration-300 ease-in-out">
    <section class="flex justify-between">
        <div class="flex cursor-default items-center space-x-4">
            <img src="{{ asset('logo.svg') }}" alt="Logo" class="h-12 w-12 object-cover" />
            <span id="mobile-sidebar-menu">
                <h5 class="text-xl font-bold tracking-tight text-white">SIREPANG</h5>
                <h6 class="text-sm text-white italic">Sistem Rekam Pangan</h6>
            </span>
        </div>
        <i id="mobile-close" class="fa-solid fa-xmark mt-1.5 ml-4 h-fit cursor-pointer text-lg text-white"></i>
    </section>
    <hr class="mt-4 h-0.5 w-full text-emerald-800" />
    <nav class="mt-4 flex flex-1 flex-col justify-between">
        <div class="space-y-4">
            @if (Auth::check() && Auth::user()->tipe == 'kader')
                <x-menu
                    icon="fa-solid fa-gauge-high"
                    label="Dasbor"
                    route="penyuluh"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('dasbor') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
                <x-menu
                    icon="fa-solid fa-users"
                    label="Keluarga"
                    route="keluarga"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('Keluarga') || Request::routeIs('tambah-data-keluarga') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
            @endif
            @if (Auth::check() && Auth::user()->tipe == 'admin')
                <x-menu
                    icon="fa-solid fa-user-shield"
                    label="Dasbor"
                    route="admin"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('admin') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
                <x-menu
                    icon="fa-solid fa-map"
                    label="Data Kecamatan"
                    route="data-kecamatan"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('data-kecamatan') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
                <x-menu
                    icon="fa-solid fa-bowl-rice"
                    label="Rekap Pangan"
                    route="rekap-pangan"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('rekap-pangan') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
                <x-menu
                    icon="fa-solid fa-bar-chart"
                    label="Rekap PPH"
                    route="rekap-pph"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('rekap-pph') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
                <x-menu
                    icon="fa-solid fa-check-double"
                    label="Verifikasi Data"
                    route="verifikasi-data"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('verifikasi-data') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
            @endif
        </div>
        <div class="mt-auto pt-4">
            <x-menu
                icon="fa-solid fa-right-to-bracket mr-2"
                label="Keluar"
                route="keluar"
                sidebar="{{ true }}"
                style="flex w-full items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out border-2 border-red-100 bg-red-500 text-white lg:mt-0 lg:px-5 lg:py-3 lg:text-base lg:hover:bg-red-600"
            />
        </div>
    </nav>
</aside>