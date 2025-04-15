<section class="bg-green-medium mt-6 w-full max-w-7xl overflow-x-auto rounded-2xl bg-transparent p-4 md:p-6">
    <div class="mb-4 flex min-w-[800px] justify-between text-white">
        <span class="flex cursor-default items-center font-bold tracking-tight">
            <i class="fa-solid fa-chart-simple mr-4 text-3xl md:text-5xl"></i>
            <h5 class="text-lg md:text-2xl">Data Kecamatan Per Tahun</h5>
        </span>
        <span class="relative mt-4 flex items-center space-x-4 md:mt-0">
            <select
                id="tahun-select"
                class="cursor-pointer appearance-none rounded-lg bg-slate-50 py-2.5 pr-14 pl-4 font-semibold text-emerald-600 shadow-lg focus:ring-2 focus:ring-slate-300 focus:outline-none"
                {{ count($tahun) === 0 ? 'disabled' : '' }}
            >
                @forelse ($tahun as $item)
                    <option value="{{ $item }}" class="text-black" {{ $item == request('tahun', date('Y')) ? 'selected' : '' }}>
                        {{ $item }}
                    </option>
                @empty
                    <option selected disabled class="text-black">—</option>
                @endforelse
            </select>
            <i class="fa-solid fa-chevron-down pointer-events-none absolute top-1/2 right-7 -translate-y-1/2 transform text-emerald-600"></i>
        </span>
    </div>
    <hr class="mb-8 h-1 w-full min-w-[800px] text-white" />
    <div class="w-full overflow-x-auto">
        <div id="column-chart" class="h-96 w-fit min-w-[800px]"></div>
        <div id="no-data-message" class="flex flex-col items-center justify-center p-6 text-center text-white" style="display: none">
            <i class="fa-solid fa-check-double mb-10 text-5xl"></i>
            <h4 class="text-lg font-semibold">Belum ada data keluarga yang terverifikasi.</h4>
        </div>
    </div>
</section>

@push('skrip')
    <script>
        const fetch_chart_data = (year) => {
            fetch(`/admin/data-kecamatan/${year}`, {
                method: 'GET',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            }).then((response) => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            }).then((data) => {
                update_chart(data);
            }).catch((error) => {
                throw error;
            });
        }

        const update_chart = (data) => {
            if (data.length === 0) {
                document.getElementById('column-chart').style.display = 'none';
                document.getElementById('no-data-message').style.display = 'flex';
                return;
            }

            document.getElementById('column-chart').style.display = 'block';
            document.getElementById('no-data-message').style.display = 'none';

            window.columnChart.updateOptions({
                xaxis: { categories: data.map((item) => item.x) },
            });

            window.columnChart.updateSeries([
                {
                    name: 'Total Keluarga',
                    data: data.map((item) => item.y),
                },
            ]);
        }

        const init_chart = (data) => {
            if (data.length === 0) {
                document.getElementById('column-chart').style.display = 'none';
                document.getElementById('no-data-message').style.display = 'flex';
                return;
            }

            document.getElementById('column-chart').style.display = 'block';
            document.getElementById('no-data-message').style.display = 'none';

            const options = {
                series: [
                    {
                        name: 'Total Keluarga',
                        color: '#f4f1e8',
                        data: data,
                    },
                ],
                chart: {
                    type: 'bar',
                    fontFamily: 'plus jakarta sans, sans-serif',
                    height: '320px',
                    width: data.length * 80,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '70%',
                        borderRadiusApplication: 'end',
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: 'plus jakarta sans, sans-serif',
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: 'lighten',
                            value: 1,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ['transparent'],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14,
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    floating: false,
                    labels: {
                        rotate: -90,
                        show: true,
                        style: {
                            fontFamily: 'plus jakarta sans, sans-serif',
                            cssClass: 'text-xs font-normal fill-white dark:fill-white',
                        },
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            };

            window.columnChart = new ApexCharts(document.querySelector('#column-chart'), options);
            window.columnChart.render();
        }

        document.addEventListener('DOMContentLoaded', () => {
            init_chart(@json($grafik_kecamatan));

            document.getElementById('tahun-select').addEventListener('change', function () {
                const selected_year = this.value;
                fetch_chart_data(selected_year);
            });
        });
    </script>
@endpush