import ApexCharts from "apexcharts";

const data = window.chartData.data ?? [];

var options1 = {
    chart: {
        type: "pie",
    },

    title: {
        text: "Partisipasi Alumni per Fakultas",
        align: "center",
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
    },

    series: Object.values(data["fakultas"]),

    labels: Object.keys(data["fakultas"]),

};

var chart1 = new ApexCharts(document.querySelector("#partisipasi"), options1);

chart1.render();
