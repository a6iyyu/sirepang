<section class="flex flex-col justify-between pt-10 lg:flex-row">
    <div class="cursor-default text-green-dark">
        <h2 class="font-bold text-3xl">
            Selamat datang, {{ ucfirst(strtolower(Auth::user()->users->username)) }}!
        </h2>
        <h5 class="mt-2 italic">
            Apa yang bisa dibantu?
        </h5>
    </div>
    <x-menu
        icon="fa-solid fa-right-to-bracket mr-2"
        label="Keluar"
        route="keluar"
        sidebar="{{ false }}"
        style="flex items-center justify-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-red-600 text-white lg:hover:bg-red-500"
    />
</section>