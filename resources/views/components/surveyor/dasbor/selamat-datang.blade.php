<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-xl font-bold md:text-2xl lg:text-3xl">
            Selamat datang,
            <br class="inline lg:hidden" />
            {{ ucfirst(strtolower(Auth::user()->kader->nama)) }}!
        </h2>
        <h5 class="mt-1 text-sm italic lg:text-base">Apa yang bisa dibantu?</h5>
    </div>
    <x-menu
        icon="fa-solid fa-right-to-bracket mr-2"
        label="Keluar"
        route="keluar"
        sidebar="{{ false }}"
        style="flex mt-4 w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-red-600 text-white lg:mt-0 lg:px-5 lg:py-3 lg:text-base lg:hover:bg-red-500"
    />
</section>