<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-xl font-bold md:text-2xl lg:text-3xl">Data Keluarga</h2>
        <h5 class="mt-1 text-sm italic lg:text-base">Silakan Masukkan Data Keluarga</h5>
    </div>
    <x-menu
        icon="fa-solid fa-plus"
        label="Keluarga"
        route="tambah-data"
        sidebar="{{ false }}"
        style="flex mt-4 w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-green-dark text-white lg:mt-0 lg:px-5 lg:py-3 lg:text-base lg:hover:bg-green-medium"
    />
</section>