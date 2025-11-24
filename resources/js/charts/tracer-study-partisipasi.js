import ApexCharts from "apexcharts";

var options1 = {
    chart: {
        type: "pie",
    },
    
    
    title: {
        text: "Partisipasi Alumni per Fakultas",
        align: "center"
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
    },

    series: [5,7,13,15,18,21,40, 25, 31],

    labels: ["FIP", "FBS", "FMIPA", "FISH", "FT", "FIKK", "FEB", "FPsi", "SPasca"],
};

var chart1 = new ApexCharts(document.querySelector("#partisipasi"), options1);

chart1.render();