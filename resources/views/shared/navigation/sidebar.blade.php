<aside class="bg-green-dark fixed z-30 hidden h-full flex-col space-y-4 rounded-r-2xl p-6 shadow-2xl transition-all duration-300 ease-in-out lg:flex">
    <section class="flex space-x-8">
        <div class="flex cursor-default items-center space-x-4">
            <img src="{{ asset('logo.svg') }}" alt="Logo" id="logo" class="h-12 w-12 object-cover" />
            <span id="sidebar-menu">
                <h5 class="text-xl font-bold tracking-tight text-white">SIREPANG</h5>
                <h6 class="text-sm text-white italic">Sistem Rekam Pangan</h6>
            </span>
        </div>
        <i id="close" class="fa-solid fa-xmark mt-1.5 h-fit cursor-pointer text-lg text-white"></i>
    </section>
    <i id="open" class="fa-solid fa-bars !hidden cursor-pointer text-center text-xl text-white"></i>
    <hr class="mt-2 h-0.5 w-full text-emerald-800" />

    <nav class="mt-2 flex-1 flex flex-col justify-between">
        <div class="space-y-4">
            @if (Auth::check() && Auth::user()->tipe == 'kader')
                <x-menu
                    icon="fa-solid fa-gauge-high"
                    label="Dasbor"
                    route="penyuluh"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('penyuluh') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
                />
                <x-menu
                    icon="fa-solid fa-users"
                    label="Keluarga"
                    route="keluarga"
                    sidebar="{{ true }}"
                    :style="'group z-30 relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' . (Request::routeIs('keluarga') || Request::routeIs('tambah-data-keluarga') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
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
        <div class="pt-4">
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