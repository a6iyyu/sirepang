<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h1 class="text-xl font-bold md:text-2xl lg:text-3xl">Selamat datang, Admin!</h1>
        <h5 class="mt-2 italic">Apa yang bisa dibantu?</h5>
    </div>
    <x-menu
        icon="fa-solid fa-right-to-bracket mr-2"
        label="Keluar"
        route="keluar"
        sidebar="{{ false }}"
        style="flex w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-red-600 text-white lg:px-5 lg:py-3 lg:text-base lg:hover:bg-red-500"
    />
</section>