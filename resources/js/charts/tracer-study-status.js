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

    responsive: [
        {
            breakpoint: 768,
            responsive: [
                {
                    breakpoint: 768,
                    options: {
                        legend: {
                            fontSize: "5px",
                            itemMargin: {
                                vertical: 5
                            }
                        },
                        chart: {
                            height: 400,
                        },
                    },
                }
            ]
        }
    ]
};

var chart1 = new ApexCharts(document.querySelector("#status"), options1);

chart1.render();
