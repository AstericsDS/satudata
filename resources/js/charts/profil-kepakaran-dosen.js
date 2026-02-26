import ApexCharts from "apexcharts";

window.renderChartDosen = function (dataValues) {
    if(window.chartDosenInstance) {
        window.chartDosenInstance.destroy();
    }

    const maxData = Math.max(
        dataValues.asisten_ahli || 0,
        dataValues.lektor || 0,
        dataValues.lektor_kepala || 0,
        dataValues.profesor || 0,
    );

    const axisMax = maxData + Math.max(1, Math.ceil(maxData * 0.2));

    var optionDosen = {
        title: {
            text: 'Jumlah Dosen',
            align: 'center',
            style: {
                fontSize: '16px'
            },
            margin: 20,
        },

        subtitle: {
            text: "Sumber: SIPEG",          
            align: 'left',
            style: {
                fontSize: '11px',
                fontWeight: 'bold'
            },
        },

        chart: {
            type: 'bar',
            height: 500,
            animations: {
                enabled: true
            }
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
            textAnchor: "start",
            offsetX: 20,
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
                name: 'Jumlah Dosen',
                data: [
                    dataValues.asisten_ahli,
                    dataValues.lektor,
                    dataValues.lektor_kepala,
                    dataValues.profesor,
                    dataValues.arsiparis,
                ],
            }
        ],

        xaxis: {
            categories: [
                'Asisten Ahli', 
                'Lektor', 
                'Lektor Kepala', 
                'Profesor',
                'Arsiparis', 
            ],
            max: axisMax,
            labels: {
                style: { fontSize: '12px' },
                formatter: function (val) {
                    return Math.round(val);
                }
            }
        },

        colors: ["#4D774E", "#006569", "#589092", "#7F7099" , "#B45309"],

        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: 0.5,
                gradientToColors: ["#8FDD91", "#6CB9AD", "#95F4F8", "#D4BBFF", "#FDE68A"],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },

        stroke: {
            show: true,
            width: 3,
            colors: ['transparent'],
        },

        grid: {
            show: false,
        },
    };

    window.chartDosenInstance = new ApexCharts(document.querySelector('#chart-dosen'), optionDosen);
    window.chartDosenInstance.render();

};