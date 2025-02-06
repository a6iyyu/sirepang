<aside
    class="fixed z-50 flex h-full flex-col space-y-4 pl-6 pr-8 py-6 rounded-r-2xl shadow-2xl bg-green-dark transition-all duration-300 ease-in-out">
    <section class="flex space-x-8">
        <div class="cursor-default flex items-center space-x-4">
            <img src="{{ asset('img/logo.webp') }}" alt="Logo" id="logo" class="h-12 w-12 object-cover" />
            <span id="sidebar-menu">
                <h5 class="text-xl font-bold tracking-tight text-white">SIREPANG</h5>
                <h6 class="text-sm italic text-white">Sistem Rekam Pangan</h6>
            </span>
        </div>
        <i id="close"
            class=" text-white fa-solid fa-arrow-up-right-from-square cursor-pointer mt-1.5 h-fit text-lg"></i>
    </section>
    <i id="open" class="fa-solid fa-bars !hidden cursor-pointer text-center text-xl"></i>
    <hr class="mt-2 h-0.5 w-full text-green-dark" />
    <nav class="mt-2 space-y-4">
        <x-menu
        icon="fa-solid fa-gauge-high mr-4"
        route="Dasbor"
        sidebar="{{ true }}"
        :style="'group relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' .
        (request()->routeIs('Dasbor') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
    />
    <x-menu
        icon="fa-solid fa-users mr-4"
        route="Keluarga"
        sidebar="{{ true }}"
        :style="'group relative flex items-center px-4 py-3 rounded-xl transition-all transform duration-300 ease-in-out ' .
        (request()->routeIs('Keluarga') ? 'bg-primary text-green-dark' : 'text-white hover:bg-green-light/50 hover:scale-105 hover:shadow-md')"
    />

    </nav>
</aside>
