import ApexCharts from "apexcharts";

var optionsArtikel = {
    series: [{
        name: "Artikel",
        data: [20, 14, 40, 35, 45]
    }],

    chart: {
        type: "line",
        height: 400,
        toolbar: {
            show: false
        }
    },

    title: {
        text: "Jumlah Publikasi Terbaru",
        align: "left"  
    },

    legend: {
        show: false
    },

    markers: {
        size: 0
    },

    colors: ['#5D5FEF'],

    stroke: {
        curve: 'smooth',
        width: 3
    },

    xaxis: {
        categories: ['2021', '2022', '2023', '2024', '2025'],
        labels: {
            style: {
                fontSize: '14px',
                colors: ['#666']
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },

    yaxis: {
        tickAmount: 5
    }
};

var optionsScopusDocumentQuartile = {
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

var optionsDataMengajar = {
    series: [{
        name: "Data Mengajar",
        data: [4, 2.5, 4, 3.5, 3, 2.5]
    }],

    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        }
    },

    title: {
        text: "Grafik SKS Mengajar (3 Tahun Terakhir)",
        align: 'left'
    },

    subtitle: {
        text: "Data diperbarui 10 jam yang lalu",
        align: 'left',
        margin: 0,
        offsetX: 0,
        style: {
            fontSize: '12px',
        }
    },

    colors: ['#006569'],

    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.5,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100],
        }
    },

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
        rotate: -90,
        offsetY: 0
    },

    legend: {
        show: false
    },

    xaxis: {
        categories: [
            ['118', '2022/2023'],
            ['119', '2022/2023'],
            ['120', '2023/2024'],
            ['121', '2023/2024'],
            ['122', '2024/2025'],
            ['123', '2024/2025']
        ],
        labels: {
            style: {
                fontSize: '12px',
                colors: ['#666']
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },

    yaxis: {
        show: false
    }
}

var optionsPublikasi = {
    series: [{
        name: "Publikasi",
        data: [12, 10, 5, 7, 10, 10, 9, 12]
    }],

    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        }
    },

    title: {
        text: "Publikasi dalam 5 Tahun Terakhir",
        align: 'left'
    },

    subtitle: {
        text: "Data diperbarui 10 jam yang lalu",
        align: 'left',
        margin: 0,
        offsetX: 0,
        style: {
            fontSize: '12px',
        }
    },

    colors: ['#006569'],

    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.5,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100],
        }
    },

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
        rotate: -90,
        offsetY: 0
    },

    legend: {
        show: false
    },

    xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025'],
        labels: {
            style: {
                fontSize: '12px',
                colors: ['#666']
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },

    yaxis: {
        show: false
    }
};

var optionsPenelitian = {
    series: [{
        name: "Penelitian",
        data: [12, 10, 5, 7, 10, 10, 9, 12]
    }],

    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        }
    },

    title: {
        text: "Penelitian dalam 5 Tahun Terakhir",
        align: 'left'
    },

    subtitle: {
        text: "Data diperbarui 10 jam yang lalu",
        align: 'left',
        margin: 0,
        offsetX: 0,
        style: {
            fontSize: '12px',
        }
    },

    colors: ['#006569'],

    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.5,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100],
        }
    },

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
        rotate: -90,
        offsetY: 0
    },

    legend: {
        show: false
    },

    xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025'],
        labels: {
            style: {
                fontSize: '12px',
                colors: ['#666']
            }
        },
        axisBorder: { show: false },
        axisTicks: { show: false },
    },

    yaxis: {
        show: false
    }
};

var chartArtikel = new ApexCharts(document.querySelector("#artikel"), optionsArtikel);
var chartScopusDocumentQuartile = new ApexCharts(document.querySelector("#scopus-chart"), optionsScopusDocumentQuartile);

chartArtikel.render();
chartScopusDocumentQuartile.render();

window.renderChartDataMengajar = function() {
    if(window.chartDataMengajar) window.chartDataMengajar.destroy();
    window.chartDataMengajar = new ApexCharts(document.querySelector("#data-mengajar"), optionsDataMengajar);
    window.chartDataMengajar.render();
};

window.renderChartPublikasi = function() {
    if(window.chartPublikasi) window.chartPublikasi.destroy();
    window.chartPublikasi = new ApexCharts(document.querySelector("#publikasi"), optionsPublikasi);
    window.chartPublikasi.render();
}

window.renderChartPenelitian = function() {
    if(window.chartPenelitian) window.chartPenelitian.destroy();
    window.chartPenelitian = new ApexCharts(document.querySelector("#penelitian"), optionsPenelitian);
    window.chartPenelitian.render();
}