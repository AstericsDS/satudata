import ApexCharts from "apexcharts";

const data = window.chartData.data ?? [];
console.log(data)

var options1 = {
    chart: {
        type: "bar",
        height: 500,
    },

    series: [
        {
            name: "Jumlah Wisudawan",
            data: Object.values(data),
        },
        {
            name: "Jumlah Mahasiswa Diterima",
            data: Object.values(data_2),
        },
    ],

    xaxis: {
        categories: Object.keys(data_2),
    },

    stroke: {
        show: true,
        width: 3,
        colors: ["transparent"],
    },

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 5,
            borderRadiusApplication: "end",
            dataLabels: {
                position: "top",
            },
        },
    },

    colors: ["#4D774E", "#30534E"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91", "#6CB9AD"],
            stops: [0, 100],
        },
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
        itemMargin: {
            horizontal: 5,
        },
    },

    dataLabels: {
        enabled: true,
        offsetY: -22,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },

    grid: {
        show: false,
    },

    title: {
        text: "Sumber: PDDIKTI",
        align: "left",
        style: {
            fontSize: "11px",
        },
        margin: 20,
    },
};

window.chart1 = new ApexCharts(document.querySelector("#chart"), options1);
window.chart1.render();