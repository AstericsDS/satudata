import ApexCharts from 'apexcharts'

var options1 = {
    chart: {
        type: 'bar',
        height: 350
    },
    series: [
        // {
        // name: 'Jumlah Mahasiswa',
        // data: [30, 40, 45, 50, 49, 60, 70, 80]
        // },
        {
            name: 'Jumlah Mahasiswa Diterima',
            data: [6979, 7019, 8082, 8722, 12671, 11604, 27477, 9280]
        }
    ],
    colors: ["#4D774E", "#9DC88D"],
    dataLabels: {
        enabled: true,
        offsetY: -18,
        position: 'top',
        style: {
            colors: ["#000000"],
            fontSize: '11px'
        }
    },
    xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025']
    },
    plotOptions: {
        bar: {
            columnWidth: '25%',
            borderRadius: 3,
            borderRadiusApplication: 'end',
            dataLabels: {
                position: 'top',
            }
        }
    }
};

var options2 = {
    chart: {
        type: 'pie',
        height: 350
    },
    series: [27346, 2025, 1072, 3640],
    labels: ['S1', 'S2', 'S3', 'D4'],
    colors: ["#4D774E", "#9DC88D", "#006569", "#00b3ba"],

};

var options3 = {
    chart: {
        type: 'bar',
        height: 350
    },
    series: [
        {
            name: 'Jumlah Mahasiswa',
            data: [2786, 5114, 7531, 6716, 5114, 6966, 3249, 7227, 5228, 2987]
        },
    ],
    colors: ["#4D774E"],
    xaxis: {
        categories: ['Pascasarjana', 'FIP', 'FBS', 'FMIPA', 'FISH', 'FT', 'FIK', 'FEB', 'FP', 'PPG']
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
            borderRadiusApplication: 'end',
            columnWidth: '40%',
            dataLabels: {
                position: 'top'
            }
        },
    },
    dataLabels: {
        enabled: true,
        offsetY: -18,
        style: {
            colors: ["#000000"],
            fontSize: "11px"
        }
    }
}

var options4 = {
    chart: {
        type: 'bar',
        stacked: 'true'
    },
    series: [
        {
            name: "Peminat SNMPTN",
            data: [38693, 38810, 37075, 36605, 38651]
        },
        {
            name: "Peminat SBMPTN",
            data: [43458, 41641, 34204, 43086, 45121]
        },
        {
            name: "Peminat Mandiri",
            data: [37161, 42120, 93111, 43585, 57182]
        }
    ],
    xaxis: {
        categories: [2020, 2021, 2022, 2023, 2024]
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
            borderRadiusApplication: 'end',
            columnWidth: '40%',
        },
    },
    colors: ["#4D774E", "#9DC88D", "#006569"],
}

var chart1 = new ApexCharts(document.querySelector("#angkatan"), options1);
var chart2 = new ApexCharts(document.querySelector("#jenjang"), options2);
var chart3 = new ApexCharts(document.querySelector("#fakultas"), options3);
var chart4 = new ApexCharts(document.querySelector("#peminat"), options4);
chart1.render();
chart2.render();
chart3.render();
chart4.render();