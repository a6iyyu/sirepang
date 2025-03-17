<div class="max-w-8xl w-full bg-transparent bg-green-medium rounded-2xl mt-6  p-4 md:p-6">
    <div class="flex justify-between pb-4 mb-4 ">
      <div class="flex items-center">
        <div class="w-12 h-12 rounded-lg bg-transparent flex items-center justify-center me-3">
            <i class="fa-solid fa-chart-simple text-white text-5xl"></i>
        </div>
        <div>
          <h5 class="leading-none text-center text-4xl font-bold text-white pb-1">Data Kecamatan</h5>
          <p class="text-xl font-normal text-white">Per Tahun</p>
        </div>
      </div>
      <div>
      </div>
    </div>
    <div id="column-chart"></div>
      <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-white justify-between">
        <div class="flex justify-between items-center pt-5">
          <a
            href="#"
            class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-white hover:text-white 100 dark:hover:bg-green-900 duration-300 px-3 py-2">
            Data Kecamatan <span class="ml-2"><i class="fa-solid fa-arrow-right"></i></span>
          </a>
        </div>
      </div>
  </div>
  <script>

const options = {
  colors: ["#f4f1e8"],
  series: [
    {
      name: "2025",
      color: "#f4f1e8",
      data: [
        { x: "Pakis", y: 231 },
        { x: "Singosari", y: 122 },
        { x: "Kepanjen", y: 63 },
        { x: "Lawang", y: 421 },
        { x: "DAU", y: 122 },
        { x: "Pakisaji", y: 323 },
        { x: "Pasir", y: 111 },
      ],
    },
  ],
  chart: {
    type: "bar",
    height: "320px",
    fontFamily: "plus jakarta sans, sans-serif",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "70%",
      borderRadiusApplication: "end",
      borderRadius: 8,
    },
  },
  tooltip: {
    shared: true,
    intersect: false,
    style: {
      fontFamily: "plus jakarta sans, sans-serif",
    },
  },
  states: {
    hover: {
      filter: {
        type: "lighten",
        value: 1,
      },
    },
  },
  stroke: {
    show: true,
    width: 0,
    colors: ["transparent"],
  },
  grid: {
    show: false,
    strokeDashArray: 4,
    padding: {
      left: 2,
      right: 2,
      top: -14
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
      show: true,
      style: {
        fontFamily: "plus jakarta sans, sans-serif",
        cssClass: 'text-xs font-normal fill-white dark:fill-white',
      }
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
}

if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("column-chart"), options);
  chart.render();
}

  </script>
