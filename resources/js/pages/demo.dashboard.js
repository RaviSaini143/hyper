/**
 * Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Dashboard
 */


import 'daterangepicker/daterangepicker.js';
import ApexCharts from 'apexcharts';

import jsVectorMap from 'jsvectormap'
import 'jsvectormap/dist/maps/world-merc.js'
import 'jsvectormap/dist/maps/world.js'



! function ($) {
    "use strict";

    var Dashboard = function () {
        this.$body = $("body"),
            this.charts = []
    };


    Dashboard.prototype.initCharts = function () {
        window.Apex = {
            chart: {
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            grid: {
                padding: {
                    left: 0,
                    right: 0
                }
            },
            colors: ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"],
        };

        var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#revenue-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }

        var options = {
            chart: {
                height: 370,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    opacity: 0.2,
                    blur: 7,
                    left: -7,
                    top: 7
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 4
            },
            series: [{
                name: 'Current Week',
                data: [10, 20, 15, 25, 20, 30, 20]
            }, {
                name: 'Previous Week',
                data: [0, 15, 10, 30, 15, 35, 25]
            }],
            colors: colors,
            zoom: {
                enabled: false
            },
            legend: {
                show: false
            },
            xaxis: {
                type: 'string',
                categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false
                }
            },
            grid: {
                strokeDashArray: 7,
            },
            yaxis: {
                stepSize: 9,
                labels: {
                    formatter: function (val) {
                        return val + "k"
                    },
                    offsetX: -15
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            options
        );

        chart.render();

        // --------------------------------------------------
        var colors = ["#727cf5", "#e3eaef"];
        var dataColors = $("#high-performing-product").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }

        var options = {
            chart: {
                height: 256,
                type: 'bar',
                stacked: true
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '20%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 0,
                colors: ['transparent']
            },
            series: [{
                name: 'Actual',
                data: [65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80, 81]
            }, {
                name: 'Projection',
                data: [89, 40, 32, 65, 59, 80, 81, 56, 89, 40, 65, 59]
            }],
            zoom: {
                enabled: false
            },
            legend: {
                show: false
            },
            colors: colors,
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                axisBorder: {
                    show: false
                },
            },
            yaxis: {
                stepSize: 40,
                labels: {
                    formatter: function (val) {
                        return val + "k"
                    },
                    offsetX: -15
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "$" + val + "k"
                    }
                },
            },
        }

        var chart = new ApexCharts(
            document.querySelector("#high-performing-product"),
            options
        );

        chart.render();

        // --------------------------------------------------
        var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#average-sales").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                height: 202,
                type: 'donut',
            },
            legend: {
                show: false
            },
            stroke: {
                width: 0
            },
            series: [44, 55, 41, 17],
            labels: ["Direct", "Affilliate", "Sponsored", "E-mail"],
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
        }

        var chart = new ApexCharts(
            document.querySelector("#average-sales"),
            options
        );

        chart.render();
    },

        // inits the map
        Dashboard.prototype.initMaps = function () {
            const map = new jsVectorMap({
                map: 'world',
                selector: '#world-map-markers',
                zoomOnScroll: false,
                zoomButtons: true,
                markersSelectable: true,
                hoverOpacity: 0.7,
                hoverColor: false,

                regionStyle: {
                    initial: {
                        fill: 'rgba(145, 166, 189, 0.25)'
                    }
                },

                markerStyle: {
                    initial: {
                        r: 9,
                        'fill': '#727cf5',
                        'fill-opacity': 0.9,
                        'stroke': '#fff',
                        'stroke-width': 7,
                        'stroke-opacity': 0.4
                    },

                    hover: {
                        'stroke': '#fff',
                        'fill-opacity': 1,
                        'stroke-width': 1.5
                    }
                },
                backgroundColor: 'transparent',
                markers: [
                    { coords: [40.71, -74.00], name: 'New York' },
                    { coords: [37.77, -122.41], name: 'San Francisco' },
                    { coords: [-33.86, 151.20], name: 'Sydney' },
                    { coords: [1.3, 103.8], name: 'Singapore' }
                ],
            });
        },

        // initializing various components and plugins
        Dashboard.prototype.init = function () {
            var $this = this;
            // font
            // Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';

            //default date range picker
            $('#dash-daterange').daterangepicker({
                singleDatePicker: true
            });

            // init charts
            this.initCharts();

            //init maps
            this.initMaps();
        },

        //init Flotchart
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

    //initializing Dashboard
    function ($) {
        "use strict";
        $(document).ready(function (e) {
            $.Dashboard.init();
        });
    }(window.jQuery);
