import ApexCharts from 'apexcharts'

var donutOption = {
    chart: {
        type: 'donut' // ✅ use 'donut', not 'circle'
    },
    series: [37, 69],
    labels: ['S1', 'S2'],
    plotOptions: {
        pie: {
            donut: {
                labels: {
                    show: true,
                    name: {
                        show: true,
                        fontSize: '16px',
                        color: '#333',
                        offsetY: -10
                    },
                    value: {
                        show: true,
                        fontSize: '20px',
                        color: '#111',
                        offsetY: 10,
                        formatter: function (val) {
                            return val;
                        }
                    },
                    total: {
                        show: true,
                        label: 'Total',
                        formatter: function (w) {
                            return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                        }
                    }
                }
            }
        }
    }
};

var donutChart = new ApexCharts(document.querySelector("#donut"), donutOption);
donutChart.render();
  
  var options = {
      chart: {
          type: 'bar'
        },
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        series: [{
            data: [{
                x: 'category A',
                y: 10,
                fillColor: '#a6da95'
            }, {
                x: 'category B',
                y: 18,
                fillColor: '#ed8796'
            }, {
                x: 'category C',
                y: 13,
                fillColor: '#8aadf4',
                strokeColor: '#C23829'
            }]
    }]
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();