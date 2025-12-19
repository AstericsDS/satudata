import ApexCharts from "apexcharts";

window.renderChartTendik = function (dataValues) {
    if(window.chartTendikInstance) {
        window.chartTendikInstance.destroy();
    }

    var optionTendik = {
        title: {
            text: "Jumlah Tenaga Kependidikan",
            align: "center",
            style: {
                fontSize: "16px",
            },
            margin: 20,
        },

        subtitle: {
            text: "Sumber: SIPEG",
            align: "left",
            style: {
                fontSize: "11px",
                fontWeight: "bold",
            },
        },

        chart: {
            type: "bar",
            height: 500,
            animations: {
                enabled: true,
            },
        },

        plotOptions: {
            bar: {
                horizontal: true,
                borderRadius: 5,
                borderRadiusApplication: "end",
                dataLabels: {
                    position: "top",
                },
                distributed: true,
            },
        },

        dataLabels: {
            enabled: true,
            offsetX: 30,
            style: {
                fontSize: "12px",
                colors: ["#304758"],
            },
        },

        legend: {
            position: "bottom",
            horizontalAlign: "center",
            itemMargin: {
                horizontal: 5,
            },
        },

        series: [
            {
                name: "Jumlah Tenaga Kependidikan",
                data: [
                    dataValues.tendik_pns,
                    dataValues.tendik_tetap,
                    dataValues.tendik_tidak_tetap,
                    dataValues.tendik_pppk,
                ],
            },
        ],

        xaxis: {
            categories: [
                "Tendik PNS",
                "Tendik Tetap",
                "Tendik Tidap Tetap",
                "Tendik PPPK",
            ],
            labels: {
                style: { fontSize: "12px" },
            },
        },

        colors: ["#4D774E", "#006569", "#589092", "#7F7099"],

        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: 0.5,
                gradientToColors: ["#8FDD91", "#6CB9AD", "#95F4F8", "#D4BBFF"],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },

        stroke: {
            show: true,
            width: 3,
            colors: ["transparent"],
        },

        grid: {
            show: false,
        },
    };

    window.chartTendikInstance = new ApexCharts(
        document.querySelector("#chart-tendik"),
        optionTendik
    );
    window.chartTendikInstance.render();
};
