import ApexCharts from "apexcharts";

var options1 = {
    chart: {
        type: "pie",
    },

    title: {
        text: "Status Pekerjaan Alumni",
        align: "center",
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
    },

    series: [1, 3, 5, 10],

    labels: ["Bekerja", "Melanjutkan Studi", "Wiraswasta", "Belum Bekerja"],
};

var chart1 = new ApexCharts(document.querySelector("#status"), options1);

chart1.render();
