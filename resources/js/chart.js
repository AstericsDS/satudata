import ApexCharts from 'apexcharts'

const jumlah_mahasiswa_diterima = window.chartData.jumlah_mahasiswa_diterima;
const jumlah_mahasiswa = window.chartData.jumlah_mahasiswa;

var options1 = {
    chart: {
        type: 'line',
        height: 350
    },
    series: [
        {
            name: 'Jumlah Mahasiswa Diterima',
            data: jumlah_mahasiswa_diterima,
        },
        {
            name: 'Jumlah Mahasiswa',
            data: jumlah_mahasiswa,
        }
    ],
    colors: ["#4D774E", "#9DC88D"],
    dataLabels: {
        enabled: false,
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
            dataLabels: {
                total: {
                    enabled: true,
                    // buat nampilin koma tapi display masih berantakan
                    // formatter: function (value) {
                    //     return value.toLocaleString();  
                    // },
                    style: {
                        fontSize: '14px',
                        fontWeight: 'bold',
                        color: '#333'
                    },
                    offsetY: -10,
                }
            }
        },
    },
    colors: ["#4D774E", "#9DC88D", "#006569"],
}

var options5 = {
    chart: {
        type: 'pie',
        height: 350
    },
    series: [1695, 811],
    labels: ['S2', 'S3'],
    colors: ["#4D774E", "#9DC88D"],
};

var options6 = {
    chart: {
        type: 'pie',
        height: 350
    },
    series: [5, 814, 1000, 674, 286],
    labels: ['PLP Terampil Mahir', 'Asisten Ahli', 'Lektor', 'Lektor Kepala','Profesor'],
    colors: ["#4D774E", "#9DC88D", "#55a630", "#006569", "#00b3ba"],
};

// note = di api pddikti ga ada status kepegawaian. labels masih ngikutin punya unnes
var options7 = {
    chart: {
        type: 'pie',
        height: 350
    },
    series: [70, 55, 204, 148, 403, 1173],
    labels: ['Tidak Tetap', 'Calon Pegawai Tetap', 'Tetap', 'PPPK','CPNS', 'PNS'],
    colors: ["#4D774E", "#9DC88D", "#00b3ba", "#004b23", "#006569", "#55a630"],
};

// data hitung manual dari response.json. masih tidak bisa pake api siakad </3
var options8 = {
    chart: {
        type: 'bar',
        height: 350
    },
    series: [
        {
            name: 'Jumlah Dosen',
            data: [72, 598, 277, 197, 183, 276, 163, 195, 57, 4]
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
};

var chart1 = new ApexCharts(document.querySelector("#angkatan"), options1);
var chart2 = new ApexCharts(document.querySelector("#jenjang"), options2);
var chart3 = new ApexCharts(document.querySelector("#fakultas"), options3);
var chart4 = new ApexCharts(document.querySelector("#peminat"), options4);
var chart5 = new ApexCharts(document.querySelector("#dosen-gelar"), options5);
var chart6 = new ApexCharts(document.querySelector("#dosen-jabatan"), options6);
var chart7 = new ApexCharts(document.querySelector("#dosen-pegawai"), options7);
var chart8 = new ApexCharts(document.querySelector("#dosen-fakultas"), options8);

chart1.render();
chart2.render();
chart3.render();
chart4.render();
chart5.render();
chart6.render();
chart7.render();
chart8.render();