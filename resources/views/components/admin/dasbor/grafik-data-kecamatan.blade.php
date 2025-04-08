<section class="max-w-8xl bg-green-medium mt-6 w-full overflow-x-auto rounded-2xl bg-transparent p-4 md:p-6">
    <div class="mb-4 flex min-w-[800px] justify-between text-white">
        <span class="flex cursor-default items-center font-bold tracking-tight">
            <i class="fa-solid fa-chart-simple mr-4 text-3xl md:text-5xl"></i>
            <h5 class="text-lg md:text-2xl">Data Kecamatan Per Tahun</h5>
        </span>
        <span class="flex items-center space-x-4 mt-4 md:mt-0">
            <div class="relative">
                <select
                    class="appearance-none rounded-full bg-gradient-to-r from-green-500 to-green-700 py-2 pr-10 pl-4 text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-green-300">
                    @foreach ($tahun as $item)
                        <option value="{{ $item }}" class="text-black">{{ $item }}</option>
                    @endforeach
                </select>
                <i
                    class="fa-solid fa-chevron-down pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 text-white"></i>
            </div>
        </span>
    </div>
    <hr class="mb-8 h-1 w-full min-w-[800px] text-white" />
    <div id="column-chart" class="min-w-[800px] overflow-x-auto"></div>

    <script>
        window.chartData = @json($chart_data);
    </script>
</section>
