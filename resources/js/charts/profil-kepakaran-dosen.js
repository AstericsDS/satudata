import ApexCharts from "apexcharts";

window.renderChartDosen = function (dataValues) {
    if(window.chartDosenInstance) {
        window.chartDosenInstance.destroy();
    }

    // const data_profesor = window.chartDosen.data_profesor ?? [];
    // const data_lektor_kepala = window.chartDosen.data_lektor_kepala ?? [];
    // const data_lektor = window.chartDosen.data_lektor ?? [];
    // const data_asisten_ahli = window.chartDosen.data_asisten_ahli ?? [];
    // const data_arsiparis_muda = window.chartDosen.data_arsiparis_muda ?? [];
    // const series = [];

    // if(data_profesor.length !== 0 && data_lektor_kepala.length !== 0 && data_lektor.length !== 0 && data_asisten_ahli.length !== 0 && data_arsiparis_muda.length !== 0) {
    //     series.push(
    //         {
    //             name: "Jumlah Profesor",
    //             data: Object.values(data_profesor),
    //         },
    //         {
    //             name: "Jumlah Lektor Kepala",
    //             data: Object.values(data_lektor_kepala),
    //         },
    //         {
    //             name: "Jumlah Lektor",
    //             data: Object.values(data_lektor),
    //         },
    //         {
    //             name: "Jumlah Asisten Ahli",
    //             data: Object.values(data_asisten_ahli),
    //         },
    //         {
    //             name: "Jumlah Arsiparis Muda",
    //             data: Object.values(data_arsiparis_muda),
    //         },
    //     );
    // }

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
                    // dataValues.asriparis_muda,
                ]
            }
        ],

        xaxis: {
            categories: [
                'Asisten Ahli', 
                'Lektor', 
                'Lektor Kepala', 
                'Profesor', 
                // 'Arsiparis Muda'
            ],
            labels: {
                style: { fontSize: '12px' }
            }
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
            colors: ['transparent'],
        },

        grid: {
            show: false,
        },
    };

    window.chartDosenInstance = new ApexCharts(document.querySelector('#chart-dosen'), optionDosen);
    window.chartDosenInstance.render();

};