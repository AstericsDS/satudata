import ApexCharts from "apexcharts";

const data = window.chartData ?? [];
console.log(data);

var options1 = {
    chart: {
        type: "bar",
        height: 500,
        toolbar: false,
    },

    title: {
        text: "Statistik Dokumen Kerja Sama Berdasarkan Tahun",
        align: "center",
        marign: 60,
    },

    stroke: {
        show: true,
        width: 3,
        colors: ["transparent"],
    },

    series: [
        {
            name: "MOU",
            data: Object.values(data["mou"]),
        },
        {
            name: "MOA",
            data: Object.values(data["moa"]),
        },
        {
            name: "IA",
            data: Object.values(data["ia"]),
        },
    ],

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 5,
            borderRadiusApplication: "top",
            dataLabels: {
                position: "top",
            },
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

    xaxis: {
        categories: Object.keys(data["mou"]),
    },

    yaxis: {
        show: false,
    },

    colors: ["#4D774E", "#589092", "#7F7099"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91", "#95F4F8", "#D4BBFF"],
            stops: [0, 100],
        },
    },

    legend: {
        markers: {
            shape: "circle",
        },
    },

    grid: {
        show: false,
    },
};

var chart1 = new ApexCharts(document.querySelector("#dokumen"), options1);

chart1.render();
