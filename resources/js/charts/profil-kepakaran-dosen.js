import ApexCharts from "apexcharts";

var optionsDosen = {
    chart: {
        type: "bar",
        height: 500,
        toolbar: {
            show: false,
        },
    },

    title: {
        text: "Jumlah Dosen",
        align: "center",
        style: {
            fontSize: "16px",
        },
    },

    series: [
        {
            name: "Jumlah Profesor",
            data: [10, 15, 10, 20, 25, 20],
        },
        {
            name: "Jumlah Lektor Kepala",
            data: [20, 25, 30, 35, 30, 40],
        },
        {
            name: "Jumlah Lektor",
            data: [30, 35, 40, 45, 50, 55],
        },
        {
            name: "Jumlah Asisten Ahli",
            data: [10, 15, 10, 20, 25, 20],
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

    stroke: {
        show: true,
        width: 3,
        colors: ["transparent"],
    },

    dataLabels: {
        enabled: true,
        offsetY: -22,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },

    colors: ["#4D774E", "#006569", "#589092", "#7F7099"],

    fill: {
        type: "gradient",
        gradient: {
            shade: "light",
            type: "vertical",
            shadeIntensity: 0.5,
            gradientToColors: ["#8FDD91", "#6CB9AD", "#95F4F8", "#D4BBFF"],
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100],
        },
    },

    xaxis: {
        categories: [2020, 2021, 2022, 2023, 2024, 2025],
        labels: {
            style: {
                fontSize: "14px",
                colors: ["#666"],
            },
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },
};

var chartDosen = new ApexCharts(
    document.querySelector("#chart-dosen"),
    optionsDosen
);
chartDosen.render();
