import ApexCharts from "apexcharts";

const data = window.chartData.data ?? [];
console.log(data)

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

    series: Object.values(data['status_pekerjaan']),

    labels: Object.keys(data['status_pekerjaan']),

};

var chart1 = new ApexCharts(document.querySelector("#status"), options1);

chart1.render();
