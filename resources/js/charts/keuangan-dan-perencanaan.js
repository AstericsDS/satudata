import ApexCharts from "apexcharts";

var options1 = {
    chart: {
        type: "pie",
        height: 500,
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
        itemMargin: {
            vertical: 25,
        },
    },

    tooltip: {
        y: {
            formatter: function (value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            },
        },
    },

    series: [18200000000, 7300000000],

    labels: ["Realisasi", "Sisa Anggaran"],
};

var options2 = {
    chart: {
        type: "pie",
        height: 500,
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
        itemMargin: {
            vertical: 25,
        },
    },

    tooltip: {
        y: {
            formatter: function (value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            },
        },
    },

    series: [7800000000, 11300000000],

    labels: ["Lorem 1", "Lorem 2"],
};

var options3 = {
    chart: {
        type: "pie",
        height: 500,
    },

    legend: {
        position: "bottom",
        horizontalAlign: "center",
        itemMargin: {
            vertical: 25,
        },
    },

    tooltip: {
        y: {
            formatter: function (value) {
                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            },
        },
    },

    series: [3500000000, 23750000000],

    labels: ["Lorem 1", "Lorem 2"],
};

window.renderChart1 = function() {
    if (window.chart1) window.chart1.destroy();
    window.chart1 = new ApexCharts(document.querySelector("#daya-serap-universitas"), options1);
    window.chart1.render();
};
window.renderChart2 = function() {
    if (window.chart2) window.chart2.destroy();
    window.chart2 = new ApexCharts(document.querySelector("#anggaran-per-akun-belanja"), options2);
    window.chart2.render();
};
window.renderChart3 = function() {
    if (window.chart3) window.chart3.destroy();
    window.chart3 = new ApexCharts(document.querySelector("#anggaran-per-output"), options3);
    window.chart3.render();
};


var chart1 = new ApexCharts(
    document.querySelector("#daya-serap-universitas"),
    options1
);

var chart2 = new ApexCharts(
    document.querySelector("#anggaran-per-akun-belanja"),
    options2
);

var chart3 = new ApexCharts(
    document.querySelector("#anggaran-per-output"),
    options3
);