import ApexCharts from "apexcharts";

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

    series: [
        {
            name: "MOU",
            data: [10, 8, 12, 5, 10],
        },
        {
            name: "MOA",
            data: [5, 4, 6, 3, 5],
        },
        {
            name: "IA",
            data: [3, 2, 4, 1, 2],
        },
    ],

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 5,
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
        categories: [2021, 2022, 2023, 2024, 2025],
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
            shape: "circle"
        }
    },

    grid: {
        show: false,
    }
};

var chart1 = new ApexCharts(document.querySelector("#dokumen"), options1);

chart1.render();
