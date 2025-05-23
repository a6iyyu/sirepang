const Options = (data = []) => {
    return {
        colors: ['#f4f1e8'],
        series: [
            {
                name: '2025',
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
};

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('column-chart') && typeof ApexCharts !== 'undefined') {
        const data = window.grafik_kecamatan ?? [];
        const chart = new ApexCharts(document.getElementById('column-chart'), Options(data));
        chart.render();
    }
});