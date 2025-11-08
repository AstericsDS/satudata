import ApexCharts from "apexcharts";

const jumlah_mahasiswa = window.chartData.jumlah_mahasiswa;
const jumlah_mahasiswa_diterima = window.chartData.jumlah_mahasiswa_diterima;
const mahasiswa_fakultas = window.chartData.jumlah_mahasiswa_fakultas;
const jumlah_mahasiswa_s1 = window.chartData.jumlah_mahasiswa_s1;
const jumlah_mahasiswa_s2 = window.chartData.jumlah_mahasiswa_s2;
const jumlah_mahasiswa_s3 = window.chartData.jumlah_mahasiswa_s3;
const dosen_pendidikan = window.chartData.dosen_pendidikan;
const dosen_jabatan = window.chartData.dosen_jabatan;
const dosen_fakultas = window.chartData.dosen_fakultas;
const dosen_status = window.chartData.dosen_status;

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
            name: "Jumlah Mahasiswa Aktif",
            data: Object.values(jumlah_mahasiswa),
        },
        {
            name: "Jumlah Mahasiswa Diterima",
            data: Object.values(jumlah_mahasiswa_diterima),
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
        categories: Object.keys(jumlah_mahasiswa),
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
            name: "Jumlah Mahasiswa Aktif",
            data: Object.values(jumlah_mahasiswa),
        },
        {
            name: "Jumlah Mahasiswa Diterima",
            data: Object.values(jumlah_mahasiswa_diterima),
        },
    ],

    dataLabels: {
        enabled: false,
    },

    yaxis: {
        show: false,
    },

    xaxis: {
        show: false,
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
        },
    },

    grid: {
        show: false
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
            data: Object.values(mahasiswa_fakultas),
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
        categories: Object.keys(mahasiswa_fakultas),
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
            data: Object.values(mahasiswa_fakultas),
        },
    ],

    xaxis: {
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
        },
    },

    dataLabels: {
        enabled: false,
    },

    yaxis: {
        show: false,
    },

    grid: {
        show: false
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
            data: Object.values(jumlah_mahasiswa_s1),
        },
        {
            name: "Jumlah Mahasiswa S2",
            data: Object.values(jumlah_mahasiswa_s2),
        },
        {
            name: "Jumlah Mahasiswa S3",
            data: Object.values(jumlah_mahasiswa_s3),
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
        categories: Object.keys(jumlah_mahasiswa_s1),
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
            data: Object.values(jumlah_mahasiswa_s1),
        },
        {
            name: "Jumlah Mahasiswa S2",
            data: Object.values(jumlah_mahasiswa_s2),
        },
        {
            name: "Jumlah Mahasiswa S3",
            data: Object.values(jumlah_mahasiswa_s3),
        },
    ],

    xaxis: {
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
        },
    },

    dataLabels: {
        enabled: false,
    },

    yaxis: {
        show: false,
    },

    grid: {
        show: false
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
            data: [0, 0, 0, 0, 0, 0, 0, 0],
        },
        {
            name: "Peminat SBMPTN",
            data: [0, 0, 0, 0, 0, 0, 0, 0],
        },
        {
            name: "Peminat Mandiri",
            data: [0, 0, 0, 0, 0, 0, 0, 0],
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
        categories: Object.keys(jumlah_mahasiswa),
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
            data: [0, 0, 0, 0, 0, 0, 0, 0],
        },
        {
            name: "Peminat SBMPTN",
            data: [0, 0, 0, 0, 0, 0, 0, 0],
        },
        {
            name: "Peminat Mandiri",
            data: [0, 0, 0, 0, 0, 0, 0, 0],
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
            show: false,
        },
        categories: Object.keys(jumlah_mahasiswa),
    },

    grid: {
        show: false
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

    series: Object.values(dosen_pendidikan),

    labels: Object.keys(dosen_pendidikan),

};

var options10 = {
    chart: {
        type: "pie",
        height: 200,
    },

    series: Object.values(dosen_pendidikan),

    labels: Object.keys(dosen_pendidikan),

    legend: {
        show: false
    },
};

var options11 = {
    chart: {
        type: "pie",
        height: 400,
    },

    series: Object.values(dosen_jabatan),

    labels: Object.keys(dosen_jabatan),

};

var options12 = {
    chart: {
        type: "pie",
        height: "100%",
    },

    series: Object.values(dosen_jabatan),

    labels: Object.keys(dosen_jabatan),

    legend: {
        show: false
    },
};

var options13 = {
    chart: {
        type: "pie",
        height: 400,
    },


    series: Object.values(dosen_fakultas),

    labels: Object.keys(dosen_fakultas),

};

var options14 = {
    chart: {
        type: "pie",
        height: 200,
    },


    series: Object.values(dosen_fakultas),

    labels: Object.keys(dosen_fakultas),

    legend: {
        show: false
    },
};

var options15 = {
    chart: {
        type: "pie",
        height: 400,
    },


    series: Object.values(dosen_status),

    labels: Object.keys(dosen_status),

};

var options16 = {
    chart: {
        type: "pie",
        height: 200,
    },

    series: Object.values(dosen_status),

    labels: Object.keys(dosen_status),

    legend: {
        show: false
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
