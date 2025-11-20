import ApexCharts from "apexcharts";

var options = {
    series: [{
        name: "Dokumen",
        data: [2, 2.7, 4, 3.5, 3]
    }],

    chart: {
        height: 350,
        type: 'bar',
        toolbar: {
            show: false
        }
    },

    title: {
        text: "Scopus Document Quartile",
        align: 'left'
    },

    colors: ['#A31D24', '#8BC387', '#B29FD2', '#7BC8CC', '#D9C21C'],

    plotOptions: {
        bar: {
            borderRadius: 4,
            columnWidth: '70%',
            distributed: true,
            dataLabels: {
                position: 'center'
            }
        }
    },

    dataLabels: {
        enabled: true,
        style: {
            fontSize: '14px',
            colors: ['#ffffff']
        },
        rotate: -90
    },

    legend: {
        show: false
    },

    xaxis: {
        categories: ['Non Quartile', 'Q1', 'Q2', 'Q3', 'Q4'],
        labels: {
            style: {
                fontSize: '14px',
                colors: ['#666']
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },

    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            type: 'vertical',
            shadeIntensity: 0.5,
            gradientToColors: undefined,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100],
        }
    }
};

var chart = new ApexCharts(document.querySelector("#scopus-chart"), options);
chart.render();