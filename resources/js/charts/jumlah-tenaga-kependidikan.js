import ApexCharts from "apexcharts";

const CHART_COLORS = ["#4D774E", "#006569", "#589092", "#7F7099"];
const CHART_GRADIENT_TO = ["#8FDD91", "#6CB9AD", "#95F4F8", "#D4BBFF"];
const CHART_CATEGORIES = [
    "Tendik PNS",
    "Tendik Tetap",
    "Tendik Tidak Tetap",
    "Tendik PPPK",
];

window.renderChartTendik = function (dataValues, chartType = 'bar') {
    if(window.chartTendikInstance) {
        window.chartTendikInstance.destroy();
    }

    const seriesData = [
        dataValues.tendik_pns || 0,
        dataValues.tendik_tetap || 0,
        dataValues.tendik_tidak_tetap || 0,
        dataValues.tendik_pppk || 0,
    ];

    const commonOptions = {
        title: {
            text: 'Jumlah Tenaga Kependidikan',
            align: 'center',
            style: { fontSize: '16px' },
            margin: 20,
        },

        subtitle: {
            text: 'Sumber: SIPEG',
            align: 'left',
            style: {
                fontSize: "11px",
                fontWeight: "bold",
            },
        },

        colors: CHART_COLORS,

        legend: {
            position: "bottom",
            horizontalAlign: "center",
            itemMargin: {
                horizontal: 5,
            },
        },
    };

    let optionTendik;

    if (chartType === 'pie') {
        optionTendik = {
            ...commonOptions,
            chart: {
                type: 'pie',
                height: 500,
                animations: { enabled: true },
            },
            series: seriesData,
            labels: CHART_CATEGORIES,
            dataLabels: {
                enabled: true,
                formatter: function (val, opts) {
                    return opts.w.config.labels[opts.seriesIndex] + ': ' + opts.w.globals.series[opts.seriesIndex];
                },
                style: { fontSize: '12px' },
            },
            tooltip: {
                y: {
                    formatter: function (val) { return val + ' Tenaga Kependidikan'; }
                }
            },
        };
    } else {
        const maxData = Math.max(...seriesData);
        const axisMax = maxData + Math.max(1, Math.ceil(maxData * 0.2));

        optionTendik = {
            ...commonOptions,
            chart: {
                type: 'bar',
                height: 500,
                animations: { enabled: true },
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    borderRadius: 5,
                    borderRadiusApplication: "end",
                    dataLabels: {
                        position: "top",
                    },
                    distributed: true,
                },
            },
            dataLabels: {
                enabled: true,
                offsetX: 30,
                style: {
                    fontSize: "12px",
                    colors: ["#304758"],
                },
            },
            series: [{
                name: 'Jumlah Tenaga Kependidikan',
                data: seriesData,
            }],
            xaxis: {
                categories: CHART_CATEGORIES,
                max: axisMax,
                labels: {
                    style: { fontSize: "12px" },
                    formatter: function (val) { return Math.round(val); }
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "light",
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: CHART_GRADIENT_TO,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100],
                },
            },
            stroke: {
                show: true,
                width: 3,
                colors: ['transparent'],
            },
            grid: { show: false }
        }
    }

    window.chartTendikInstance = new ApexCharts(
        document.querySelector("#chart-tendik"),
        optionTendik
    );
    window.chartTendikInstance.render();
};
