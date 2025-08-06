import ApexCharts from 'apexcharts'

var options1 = {
    chart: {
        type: 'bar',
        height: 350
    },
    series: [
        {
        name: 'Jumlah Mahasiswa',
        data: [30, 40, 45, 50, 49, 60, 70, 80]
        },
        {
            name: 'Jumlah Mahasiswa Diterima',
            data: [6979, 7019, 8082, 8722, 12671, 11604, 27477, 9280]
        }
    ],
    colors: ["#4D774E", "#9DC88D"],
    dataLabels: {
        enabled: false
    },
    tooltip: {
        y: {
            formatter: function(value){
                return value;
            },
        },
        style: {
            colors: ['#000000']
        }
    },
    xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025']
    },
    plotOptions: {
        bar: {
            columnWidth: '25%',
            borderRadius: 3,
            borderRadiusApplication: 'end'
        }
    }
};

var options2 = {
    chart: {
        type: 'pie',
        height: 300
    },
    series: [27346, 2025, 1072, 3640],
    labels: ['S1', 'S2', 'S3', 'D4'],
    colors: ["#4D774E", "#9DC88D", "#006569", "#00b3ba"],

};

var chart1 = new ApexCharts(document.querySelector("#angkatan"), options1);
var chart2 = new ApexCharts(document.querySelector("#jenjang"), options2);
chart1.render();
chart2.render();
