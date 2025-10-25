import ApexCharts from "apexcharts";

const jumlah_mahasiswa_diterima = window.chartData.jumlah_mahasiswa_diterima;
const jumlah_mahasiswa = window.chartData.jumlah_mahasiswa;

// var options1 = {
//     chart: {
//         type: "line",
//         height: 350,
//     },
//     series: [
//         {
//             name: "Jumlah Mahasiswa Diterima",
//             data: jumlah_mahasiswa_diterima,
//         },
//         {
//             name: "Jumlah Mahasiswa",
//             data: jumlah_mahasiswa,
//         },
//     ],
//     colors: ["#4D774E", "#9DC88D"],
//     dataLabels: {
//         enabled: false,
//         offsetY: -18,
//         position: "top",
//         style: {
//             colors: ["#000000"],
//             fontSize: "11px",
//         },
//     },
//     xaxis: {
//         categories: [
//             "2018",
//             "2019",
//             "2020",
//             "2021",
//             "2022",
//             "2023",
//             "2024",
//             "2025",
//         ],
//     },
//     plotOptions: {
//         bar: {
//             columnWidth: "25%",
//             borderRadius: 3,
//             borderRadiusApplication: "end",
//             dataLabels: {
//                 position: "top",
//             },
//         },
//     },
// };

var options2 = {
    chart: {
        type: "pie",
        height: 350,
    },
    // series: [27346, 2025, 1072, 3640],
    series: [
        window.chartData.jumlah_mahasiswa_s1,
        window.chartData.jumlah_mahasiswa_s2,
        window.chartData.jumlah_mahasiswa_s3,
        window.chartData.jumlah_mahasiswa_d4,
    ],
    labels: ["S1", "S2", "S3", "D4"],
    colors: ["#55a630", "#9DC88D", "#006569", "#00b3ba"],
};

var options3 = {
    chart: {
        type: "bar",
        height: 350,
    },
    series: [
        {
            name: "Jumlah Mahasiswa",
            data: [2786, 5114, 7531, 6716, 5114, 6966, 3249, 7227, 5228, 2987],
        },
    ],
    colors: ["#4D774E"],
    xaxis: {
        categories: [
            "Pascasarjana",
            "FIP",
            "FBS",
            "FMIPA",
            "FISH",
            "FT",
            "FIK",
            "FEB",
            "FP",
            "PPG",
        ],
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
            borderRadiusApplication: "end",
            columnWidth: "40%",
            dataLabels: {
                position: "top",
            },
        },
    },
    dataLabels: {
        enabled: true,
        offsetY: -18,
        style: {
            colors: ["#000000"],
            fontSize: "11px",
        },
    },
};

var options4 = {
    chart: {
        type: "bar",
        stacked: "true",
    },
    series: [
        {
            name: "Peminat SNMPTN",
            data: [38693, 38810, 37075, 36605, 38651],
        },
        {
            name: "Peminat SBMPTN",
            data: [43458, 41641, 34204, 43086, 45121],
        },
        {
            name: "Peminat Mandiri",
            data: [37161, 42120, 93111, 43585, 57182],
        },
    ],
    xaxis: {
        categories: [2020, 2021, 2022, 2023, 2024],
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
            borderRadiusApplication: "end",
            columnWidth: "40%",
            dataLabels: {
                total: {
                    enabled: true,
                    // buat nampilin koma tapi display masih berantakan
                    // formatter: function (value) {
                    //     return value.toLocaleString();
                    // },
                    style: {
                        fontSize: "14px",
                        fontWeight: "bold",
                        color: "#333",
                    },
                    offsetY: -10,
                },
            },
        },
    },
    colors: ["#4D774E", "#9DC88D", "#006569"],
};

var options5 = {
    chart: {
        type: "pie",
        height: 350,
    },
    series: [
        window.chartData.jumlah_dosen_s2,
        window.chartData.jumlah_dosen_s3,
    ],
    // series: [1695, 811],
    labels: ["S2", "S3"],
    colors: ["#55a630", "#9DC88D"],
};

var options6 = {
    chart: {
        type: "pie",
        height: 350,
    },
    // series: [5, 814, 1000, 674, 286],
    series: [
        window.chartData.jumlah_dosen_plp,
        window.chartData.jumlah_dosen_asisten,
        window.chartData.jumlah_dosen_lektor,
        window.chartData.jumlah_dosen_lektor_kepala,
        window.chartData.jumlah_dosen_profesor,
    ],
    labels: [
        "PLP Terampil Mahir",
        "Asisten Ahli",
        "Lektor",
        "Lektor Kepala",
        "Profesor",
    ],
    colors: ["#4D774E", "#9DC88D", "#55a630", "#006569", "#00b3ba"],
};

var options7 = {
    chart: {
        type: "pie",
        height: 350,
    },
    // series: [70, 55, 148, 1173],
    series: [
        window.chartData.jumlah_dosen_tidak_tetap,
        window.chartData.jumlah_dosen_tetap,
        window.chartData.jumlah_dosen_pppk,
        window.chartData.jumlah_dosen_pns,
    ],
    labels: ["Tidak Tetap", "Tetap", "PPPK", "PNS"],
    colors: ["#00b3ba", "#9DC88D", "#006569", "#55a630"],
};

var options8 = {
    chart: {
        type: "bar",
        height: 350,
    },
    series: [
        {
            name: "Jumlah Dosen",
            // data: [72, 598, 277, 197, 183, 276, 163, 195, 57, 4]
            data: [
                window.chartData.jumlah_dosen_pascasarjana,
                window.chartData.jumlah_dosen_fip,
                window.chartData.jumlah_dosen_fbs,
                window.chartData.jumlah_dosen_fmipa,
                window.chartData.jumlah_dosen_fish,
                window.chartData.jumlah_dosen_ft,
                window.chartData.jumlah_dosen_fikk,
                window.chartData.jumlah_dosen_feb,
                window.chartData.jumlah_dosen_fpsi,
                window.chartData.jumlah_dosen_ppg,
            ],
        },
    ],
    colors: ["#4D774E"],
    xaxis: {
        categories: [
            "Pascasarjana",
            "FIP",
            "FBS",
            "FMIPA",
            "FISH",
            "FT",
            "FIKK",
            "FEB",
            "FPSI",
            "PPG",
        ],
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
            borderRadiusApplication: "end",
            columnWidth: "40%",
            dataLabels: {
                position: "top",
            },
        },
    },
    dataLabels: {
        enabled: true,
        offsetY: -18,
        style: {
            colors: ["#000000"],
            fontSize: "11px",
        },
    },
};

var options9 = {
    chart: {
        type: "bar",
        height: 400,
        toolbar: {
            show: false, // Hides the hamburger menu icon
        },
    },

    series: [
        {
            name: "Jumlah Mahasiswa Diterima",
            data: jumlah_mahasiswa_diterima,
        },
        {
            name: "Jumlah Mahasiswa",
            data: jumlah_mahasiswa,
        },
    ],

    // 3. Styling the bars (the most important part)
    plotOptions: {
        bar: {
            horizontal: false, // Creates vertical bars
            columnWidth: "65%", // Width of the bar groups
            borderRadius: 5, // This creates the rounded corners
            dataLabels: {
                position: "top", // Position of data labels
            },
        },
    },

    // 4. Configuring the data labels (the numbers on the bars)
    dataLabels: {
        enabled: true,
        offsetY: -20, // Pushes the label up from the top of the bar
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },

    // 5. General styling and axes
    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"], // Makes the bar borders transparent
    },
    xaxis: {
        categories: [
            "2018",
            "2019",
            "2020",
            "2021",
            "2022",
            "2023",
            "2024",
            "2025",
        ],
        labels: {
            style: {
                fontSize: "12px",
            },
        },
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        // Hides the Y-axis completely to match your image
        show: false,
    },
    grid: {
        // Hides the background grid lines
        show: false,
    },
    // 7. Customizing the colors and legend
    colors: ["#4D774E", "#30534E"], // Colors for the first and second series
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
};

var options10 = {
    chart: {
        type: "bar",
        height: 150,
        toolbar: {
            show: false, // Hides the hamburger menu icon
        },
    },

    series: [
        {
            name: "Jumlah Mahasiswa Diterima",
            data: jumlah_mahasiswa_diterima,
        },
        {
            name: "Jumlah Mahasiswa",
            data: jumlah_mahasiswa,
        },
    ],

    dataLabels: {
        enabled: false,
    },

    yaxis: {
        show: false,
    },

    xaxis: {
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        categories: [
            "2018",
            "2019",
            "2020",
            "2021",
            "2022",
            "2023",
            "2024",
            "2025",
        ],
        labels: {
            show: true,
            rotate: -45,
            rotateAlways: true,
            labels: {
                style: {
                    fontSize: "2px",
                },
            },
        },
    },

    grid: {
        padding: {
            top: 0,
            right: 5,
            bottom: 0,
            left: 5,
        },
    },

    legend: {
        show: false,
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
};

var options11 = {
    series: [
        {
            name: "Jumlah Mahasiswa",
            data: [2786, 5114, 7531, 6716, 5114, 6966, 3249, 7227, 5228, 2987],
        },
    ],
    xaxis: {
        categories: [
            "Pascasarjana",
            "FIP",
            "FBS",
            "FMIPA",
            "FISH",
            "FT",
            "FIK",
            "FEB",
            "FP",
            "PPG",
        ],
    },
};

// var chart1 = new ApexCharts(document.querySelector("#angkatan"), options1);
var chart2 = new ApexCharts(document.querySelector("#jenjang"), options2);
var chart3 = new ApexCharts(document.querySelector("#fakultas"), options3);
var chart4 = new ApexCharts(document.querySelector("#peminat"), options4);
var chart5 = new ApexCharts(document.querySelector("#dosen-gelar"), options5);
var chart6 = new ApexCharts(document.querySelector("#dosen-jabatan"), options6);
var chart7 = new ApexCharts(document.querySelector("#dosen-pegawai"), options7);
var chart8 = new ApexCharts(
    document.querySelector("#dosen-fakultas"),
    options8
);
var chart9 = new ApexCharts(document.querySelector("#mahasiswa"), options9);
var chart10 = new ApexCharts(
    document.querySelector("#mahasiswa-option"),
    options10
);

// chart1.render();
chart2.render();
chart3.render();
chart4.render();
chart5.render();
chart6.render();
chart7.render();
chart8.render();
chart9.render();
chart10.render();
