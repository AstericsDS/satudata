import ApexCharts from "apexcharts";

const jumlah_mahasiswa_diterima = window.chartData.jumlah_mahasiswa_diterima;
const jumlah_mahasiswa = window.chartData.jumlah_mahasiswa;
const jumlah_mahasiswa_s1 = window.chartData.jumlah_mahasiswa_s1;
const jumlah_mahasiswa_s2 = window.chartData.jumlah_mahasiswa_s2;
const jumlah_mahasiswa_s3 = window.chartData.jumlah_mahasiswa_s3;

// Mahasiswa Berdasarkan Angkatan
var options1 = {
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

// Mahasiswa Berdasarkan Angkatan (small)
var options2 = {
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

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 2,
        },
    },
};

var options3 = {
    chart: {
        type: "bar",
        height: 400,
        toolbar: {
            show: false,
        },
    },

    series: [
        {
            name: "Jumlah Mahasiswa",
            data: [2786, 5114, 7531, 6716, 5114, 6966, 3249, 7227, 5228],
        },
    ],

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "65%",
            borderRadius: 5,
            dataLabels: {
                position: "top",
            },
        },
    },

    dataLabels: {
        enabled: true,
        offsetY: -20,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },

    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },
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
        show: false,
    },

    grid: {
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

    legend: {
        position: "bottom",
        horizontalAlign: "center",
        itemMargin: {
            horizontal: 5,
        },
    },
};

var options4 = {
    chart: {
        type: "bar",
        height: 150,
        toolbar: {
            show: false, // Hides the hamburger menu icon
        },
    },

    series: [
        {
            name: "Jumlah Mahasiswa",
            data: [2786, 5114, 7531, 6716, 5114, 6966, 3249, 7227, 5228],
        },
    ],

    xaxis: {
        categories: [
            "SPasca",
            "FIP",
            "FBS",
            "FMIPA",
            "FISH",
            "FT",
            "FIKK",
            "FEB",
            "FPsi",
        ],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
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

    dataLabels: {
        enabled: false,
    },

    yaxis: {
        show: false,
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

    colors: ["#4D774E"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91"],
            stops: [0, 100],
        },
    },

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 2,
        },
    },
};

var options5 = {
    chart: {
        type: "bar",
        height: 400,
        toolbar: {
            show: false,
        },
    },

    series: [
        {
            name: "Jumlah Mahasiswa S1",
            data: [1000, 1050, 1100, 1150, 1200, 1250, 1300, 1350],
        },
        {
            name: "Jumlah Mahasiswa S2",
            data: [2000, 2050, 2100, 2150, 2200, 2250, 2300, 2350],
        },
        {
            name: "Jumlah Mahasiswa S3",
            data: [3000, 3050, 3100, 3150, 3200, 3250, 3300, 3350],
        },
    ],

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "65%",
            borderRadius: 5,
            dataLabels: {
                position: "top",
            },
        },
    },

    dataLabels: {
        enabled: true,
        offsetY: -20,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },

    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
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
        show: false,
    },

    grid: {
        show: false,
    },

    colors: ["#4D774E", "#4D6245", "#30534E"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91", "#9DC88D", "#6CB9AD"],
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

var options6 = {
    chart: {
        type: "bar",
        height: 150,
        toolbar: {
            show: false, // Hides the hamburger menu icon
        },
    },

    series: [
        {
            name: "Jumlah Mahasiswa S1",
            data: [1000, 1050, 1100, 1150, 1200, 1250, 1300, 1350],
        },
        {
            name: "Jumlah Mahasiswa S2",
            data: [2000, 2050, 2100, 2150, 2200, 2250, 2300, 2350],
        },
        {
            name: "Jumlah Mahasiswa S3",
            data: [3000, 3050, 3100, 3150, 3200, 3250, 3300, 3350],
        },
    ],

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
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
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

    dataLabels: {
        enabled: false,
    },

    yaxis: {
        show: false,
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

    colors: ["#4D774E", "#4D6245", "#30534E"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91", "#9DC88D", "#6CB9AD"],
            stops: [0, 100],
        },
    },

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 2,
        },
    },
};

var options7 = {
    chart: {
        type: "bar",
        height: 400,
        toolbar: {
            show: false,
        },
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

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: "65%",
            borderRadius: 5,
            dataLabels: {
                position: "top",
            },
        },
    },

    dataLabels: {
        enabled: true,
        offsetY: -20,
        style: {
            fontSize: "12px",
            colors: ["#304758"],
        },
    },

    stroke: {
        show: true,
        width: 2,
        colors: ["transparent"],
    },

    xaxis: {
        categories: [2020, 2021, 2022, 2023, 2024],
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
        show: false,
    },

    grid: {
        show: false,
    },

    colors: ["#4D774E", "#4D6245", "#30534E"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91", "#9DC88D", "#6CB9AD"],
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

var options8 = {
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
    chart: {
        type: "bar",
        height: 150,
        toolbar: {
            show: false, // Hides the hamburger menu icon
        },
    },

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
        categories: [2020, 2021, 2022, 2023, 2024],
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

    colors: ["#4D774E", "#4D6245", "#30534E"],

    fill: {
        type: "gradient",
        gradient: {
            type: "vertical",
            gradientToColors: ["#8FDD91", "#9DC88D", "#6CB9AD"],
            stops: [0, 100],
        },
    },

    plotOptions: {
        bar: {
            horizontal: false,
            borderRadius: 2,
        },
    },
};

var options9 = {
    chart: {
        type: "pie",
        height: 400,
    },

    series: [10, 20, 30, 40],

    labels: ["Sarjana", "Magister", "Doktor", "Profesor"],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 125,
        fontSize: "20px",
        offsetX: 175,
        offsetY: 125,
    },
};

var options10 = {
    chart: {
        type: "pie",
        height: 200,
    },

    series: [10, 20, 30, 40],

    labels: ["Sarjana", "Magister", "Doktor", "Profesor"],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 75,
        fontSize: "10px",
        offsetY: 50,
        offsetX: -10,
        itemMargin: {
            vertical: -2,
            horizontal: 5,
        },
    },
};

var options11 = {
    chart: {
        type: "pie",
        height: 400,
    },

    series: [10, 20, 30, 40],

    labels: ["Asisten Ahli", "Lektor", "Lektor Kepala", "Profesor"],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 125,
        fontSize: "20px",
        offsetX: 110,
        offsetY: 125,
    },
};

var options12 = {
    chart: {
        type: "pie",
        height: "100%",
    },

    series: [10, 20, 30, 40],

    labels: ["Asisten Ahli", "Lektor", "Lektor Kepala", "Profesor"],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 75,
        width: 150,
        fontSize: "10px",
        offsetX: -10,
        offsetY: 50,
        itemMargin: {
            vertical: 2,
            horizontal: 5,
        },
    },
};

var options13 = {
    chart: {
        type: "pie",
        height: 400,
    },

    series: [10, 20, 30, 40, 50, 60, 70, 80, 90],

    labels: [
        "FIP",
        "FBS",
        "FMIPA",
        "FISH",
        "FT",
        "FIKK",
        "FEB",
        "FPsi",
        "SPasca",
    ],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 125,
        fontSize: "20px",
        offsetX: 175,
        offsetY: 110,
    },
};

var options14 = {
    chart: {
        type: "pie",
        height: 200,
    },

    series: [10, 20, 30, 40, 50, 60, 70, 80, 90],

    labels: [
        "FIP",
        "FBS",
        "FMIPA",
        "FISH",
        "FT",
        "FIKK",
        "FEB",
        "FPsi",
        "SPasca",
    ],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 125,
        fontSize: "10px",
        offsetY: 20,
        itemMargin: {
            vertical: 2,
            horizontal: -2,
        },
    },
};

var options15 = {
    chart: {
        type: "pie",
        height: 400,
    },

    series: [10, 20, 30, 40],

    labels: ["PNS", "PPPK", "Dosen Tetap", "Dosen Tidak Tetap"],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 125,
        fontSize: "20px",
        offsetX: 100,
        offsetY: 110,
    },
};

var options16 = {
    chart: {
        type: "pie",
        height: 200,
    },

    series: [10, 20, 30, 40],

    labels: ["PNS", "PPPK", "Dosen Tetap", "Dosen Tidak Tetap"],

    legend: {
        position: "right",
        horizontalAlign: "center",
        floating: false,
        height: 75,
        width: 155,
        fontSize: "10px",
        offsetX: -10,
        offsetY: 50,
        itemMargin: {
            vertical: 2,
            horizontal: 5,
        },
    },
};

var chart1 = new ApexCharts(
    document.querySelector("#mahasiswa-angkatan"),
    options1
);

var chart2 = new ApexCharts(
    document.querySelector("#mahasiswa-angkatan-small"),
    options2
);

var chart3 = new ApexCharts(
    document.querySelector("#mahasiswa-fakultas"),
    options3
);

var chart4 = new ApexCharts(
    document.querySelector("#mahasiswa-fakultas-small"),
    options4
);

var chart5 = new ApexCharts(
    document.querySelector("#mahasiswa-jenjang"),
    options5
);

var chart6 = new ApexCharts(
    document.querySelector("#mahasiswa-jenjang-small"),
    options6
);

var chart7 = new ApexCharts(document.querySelector("#peminat"), options7);

var chart8 = new ApexCharts(document.querySelector("#peminat-small"), options8);

var chart9 = new ApexCharts(
    document.querySelector("#dosen-pendidikan"),
    options9
);

var chart10 = new ApexCharts(
    document.querySelector("#dosen-pendidikan-small"),
    options10
);

var chart11 = new ApexCharts(
    document.querySelector("#dosen-jabatan"),
    options11
);

var chart12 = new ApexCharts(
    document.querySelector("#dosen-jabatan-small"),
    options12
);

var chart13 = new ApexCharts(
    document.querySelector("#dosen-fakultas"),
    options13
);

var chart14 = new ApexCharts(
    document.querySelector("#dosen-fakultas-small"),
    options14
);

var chart15 = new ApexCharts(
    document.querySelector("#dosen-kepegawaian"),
    options15
);

var chart16 = new ApexCharts(
    document.querySelector("#dosen-kepegawaian-small"),
    options16
);

chart1.render();
chart2.render();
chart3.render();
chart4.render();
chart5.render();
chart6.render();
chart7.render();
chart8.render();
chart9.render();
chart10.render();
chart11.render();
chart12.render();
chart13.render();
chart14.render();
chart15.render();
chart16.render();
