import ApexCharts from "apexcharts";

const CHART_COLORS = ["#4D774E", "#006569", "#589092", "#7F7099", "#B45309"];
const CHART_GRADIENT_TO = ["#8FDD91", "#6CB9AD", "#95F4F8", "#D4BBFF", "#FDE68A"];
const CHART_CATEGORIES = ['Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Profesor', 'Arsiparis'];

window.renderChartDosen = function (dataValues, chartType = 'bar') {
    if (window.chartDosenInstance) {
        window.chartDosenInstance.destroy();
    }

    const seriesData = [
        dataValues.asisten_ahli || 0,
        dataValues.lektor || 0,
        dataValues.lektor_kepala || 0,
        dataValues.profesor || 0,
        dataValues.arsiparis || 0,
    ];

    const commonOptions = {
        title: {
            text: 'Jumlah Dosen',
            align: 'center',
            style: { fontSize: '16px' },
            margin: 20,
        },
        subtitle: {
            text: "Sumber: SIPEG",
            align: 'left',
            style: { fontSize: '11px', fontWeight: 'bold' },
        },
        colors: CHART_COLORS,
        legend: {
            position: "bottom",
            horizontalAlign: "center",
            itemMargin: { horizontal: 5 },
        },
    };

    let optionDosen;

    if (chartType === 'pie') {
        optionDosen = {
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
                    formatter: function (val) { return val + ' Dosen'; }
                }
            },
        };
    } else {
        const maxData = Math.max(...seriesData);
        const axisMax = maxData + Math.max(1, Math.ceil(maxData * 0.2));

        optionDosen = {
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
                    dataLabels: { position: "top" },
                    distributed: true,
                },
            },
            dataLabels: {
                enabled: true,
                textAnchor: "start",
                offsetX: 20,
                style: { fontSize: "12px", colors: ["#304758"] },
            },
            series: [{
                name: 'Jumlah Dosen',
                data: seriesData,
            }],
            xaxis: {
                categories: CHART_CATEGORIES,
                max: axisMax,
                labels: {
                    style: { fontSize: '12px' },
                    formatter: function (val) { return Math.round(val); }
                }
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
            grid: { show: false },
        };
    }

    window.chartDosenInstance = new ApexCharts(document.querySelector('#chart-dosen'), optionDosen);
    window.chartDosenInstance.render();
};