export const Options = {
    colors: ["#f4f1e8"],
    series: [
        {
            name: "2025",
            color: "#f4f1e8",
            data: window.chartData ?? [], // <-- ambil dari backend
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
            show: true,
            style: {
                fontFamily: "plus jakarta sans, sans-serif",
                cssClass: "text-xs font-normal fill-white dark:fill-white",
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