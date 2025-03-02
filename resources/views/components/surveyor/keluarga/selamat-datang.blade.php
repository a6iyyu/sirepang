<section class="flex flex-col justify-between lg:flex-row">
    <div class="cursor-default text-green-dark">
        <h2 class="font-bold text-2xl lg:text-3xl">
            Data Keluarga
        </h2>
        <h5 class="mt-2 italic text-sm lg:text-base">
            Silakan Masukkan Data Keluarga
        </h5>
    </div>
    <x-menu
        icon="fa-solid fa-plus"
        label="Keluarga"
        route="tambah-data"
        sidebar="{{ false }}"
        style="mt-4 flex w-fit items-center justify-center cursor-pointer h-fit rounded-lg px-4 py-3 text-sm transition-all transform duration-300 ease-in-out bg-green-dark text-white lg:px-5 lg:py-3 lg:text-base lg:hover:bg-green-medium"
    />
</section>