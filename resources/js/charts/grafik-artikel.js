import ApexCharts from "apexcharts";

var options = {
    series: [{
        name: "Artikel",
        data: [20, 14, 40, 35, 45]
    }],

    chart: {
        type: "line",
        height: 400,
        toolbar: {
            show: false
        }
    },

    title: {
        text: "Jumlah Publikasi Terbaru",
        align: "left"  
    },

    legend: {
        show: false
    },

    markers: {
        size: 0
    },

    colors: ['#5D5FEF'],

    stroke: {
        curve: 'smooth',
        width: 3
    },

    xaxis: {
        categories: ['2021', '2022', '2023', '2024', '2025'],
        labels: {
            style: {
                fontSize: '14px',
                colors: ['#666']
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },

    yaxis: {
        tickAmount: 5
    }
};

var chart = new ApexCharts(document.querySelector("#artikel"), options);
chart.render();