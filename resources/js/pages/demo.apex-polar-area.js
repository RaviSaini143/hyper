/**
 * Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Apex Bar Charts
 */

import ApexCharts from 'apexcharts/dist/apexcharts.min.js';

//
// BASIC POLAR AREA CHART
//

var colors = ["#727cf5", "#0acf97", "#fa5c7c"];
var dataColors = $("#basic-polar-area").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}

var options = {
    series: [14, 23, 21, 17, 15, 10],
    chart: {
        height: 380,
        type: 'polarArea',
    },
    stroke: {
        colors: ['#fff']
    },
    fill: {
        opacity: 0.8
    },
    labels: ['Vote A', 'Vote B', 'Vote C', 'Vote D', 'Vote E', 'Vote F'],
    legend: {
        position: 'bottom'
    },
    colors: colors,
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 200
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

var chart = new ApexCharts(document.querySelector("#basic-polar-area"), options);
chart.render();

//
// MONOCHROME POLAR AREA
//
var options = {
    series: [42, 47, 52, 58, 65],
    chart: {
        height: 380,
        type: 'polarArea'
    },
    labels: ['Rose A', 'Rose B', 'Rose C', 'Rose D', 'Rose E'],
    fill: {
        opacity: 1
    },
    stroke: {
        width: 1
    },
    yaxis: {
        show: false
    },
    legend: {
        position: 'bottom'
    },
    plotOptions: {
        polarArea: {
            rings: {
                strokeWidth: 0
            },
            spokes: {
                strokeWidth: 0
            },
        }
    },
    theme: {
        monochrome: {
            enabled: true,
            shadeTo: 'light',
            color: '#727cf5',
            shadeIntensity: 0.6
        }
    }
};

var chart = new ApexCharts(document.querySelector("#monochrome-polar-area"), options);
chart.render();