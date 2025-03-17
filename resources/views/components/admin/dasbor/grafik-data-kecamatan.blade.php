<section class="max-w-8xl bg-green-medium mt-6 w-full overflow-x-auto rounded-2xl bg-transparent p-4 md:p-6">
    <div class="mb-4 flex min-w-[800px] justify-between text-white">
        <span class="flex cursor-default items-center font-bold tracking-tight">
            <i class="fa-solid fa-chart-simple mr-4 text-5xl"></i>
            <h5 class="text-2xl">
                Data Kecamatan
                <br />
                Per Tahun
            </h5>
        </span>
        <span class="flex items-center space-x-4">
            <x-select
                class="w-full appearance-none rounded-md bg-white px-4 py-3 text-emerald-800 focus:ring-0 focus:outline-none"
                label="Data"
                name=""
                :required="false"
                :options="[
                    'pph' => 'PPH',
                    'data_rekap_pangan' => 'Pangan',
                ]"
            />
            <x-select
                class="w-full appearance-none rounded-md bg-white px-4 py-3 text-emerald-800 focus:ring-0 focus:outline-none"
                label="Tahun"
                name="tahun"
                :required="false"
                :options="[
                    '2022' => '2022',
                    '2023' => '2023',
                    '2024' => '2024',
                    '2025' => '2025',
                    '2026' => '2026',
                ]"
            />
        </span>
    </div>
    <hr class="mb-8 h-1 w-full min-w-[800px] text-white" />
    <div id="column-chart" class="min-w-[800px] overflow-x-auto"></div>
</section>