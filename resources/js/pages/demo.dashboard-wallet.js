/**
 * Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Dashboard Analytics
 */

import ApexCharts from "apexcharts";


//
// currency-btc-chart
//

!function ($) {
    'use strict';

    var DashboardWallet = function () {
    };

    DashboardWallet.prototype.generateData = function(){
        var balanceData = [];
        for(var i=0;i<100;i++){
            balanceData.push(5000 + Math.random()*100000 + 0.8*i*i*i)
        }
        return balanceData;
    }

    DashboardWallet.prototype.init = function() {


        this.dayDummyData = this.generateData();
        this.monthDummyData = this.generateData();
        this.weekDummyData = this.generateData();
        this.yearDummyData = this.generateData();

        this.dayBalanceData = [];

        for(var i=0;i<100;i++){
            var start = new Date();
            this.dayBalanceData.push([start.setDate(start.getDate()+i - 100), this.dayDummyData[i]]);
        }

        this.weekBalanceData = [];

        for(var i=0;i<100;i++){
            var start = new Date();
            this.weekBalanceData.push([start.setDate(start.getDate() + i*7 - 100*7), this.weekDummyData[i]]);
        }

        this.monthBalanceData = [];

        for(var i=0;i<100;i++){
            var start = new Date();
            this.monthBalanceData.push([start.setDate(start.getDate() + i*30 - 100*30), this.monthDummyData[i]]);
        }

        this.yearBalanceData = [];

        for(var i=0;i<100;i++){
            var start = new Date();
            this.yearBalanceData.push([start.setDate(start.getDate() + i*365 - 100*365), this.yearDummyData[i]]);
        }

        this.initCurrencyBTC();
        this.initCurrencyCNY();
        this.initCurrencyETH();
        this.initDayBalance();
        this.initWeekBalance();
        this.initMonthBalance();
        this.initYearBalance();

    },



    DashboardWallet.prototype.initCurrencyBTC = function() {


        var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#currency-btc-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options2 = {
            chart: {
                type: 'line',
                height: 60,
                sparkline: {
                    enabled: true
                }
            },
            series: [{
                data: [25, 33, 28, 35, 30, 40]
            }],
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            markers: {
                size: 0
            },
            colors: colors,
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }


        new ApexCharts(document.querySelector("#currency-btc-chart"), options2).render();


    }

    DashboardWallet.prototype.initCurrencyCNY = function()  {
        //
        // currency-cny-chart
        //
        var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#currency-cny-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options1 = {
            chart: {
                type: 'bar',
                height: 60,
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '60%'
                }
            },
            colors: colors,
            series: [{
                data: [25, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63]
            }],
            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
            xaxis: {
                crosshairs: {
                    width: 1
                },
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }

        new ApexCharts(document.querySelector("#currency-cny-chart"), options1).render();

    }

    DashboardWallet.prototype.initCurrencyETH = function()  {

        var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
        var dataColors = $("#currency-eth-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options2 = {
            chart: {
                type: 'line',
                height: 60,
                sparkline: {
                    enabled: true
                }
            },
            series: [{
                data: [25, 33, 28, 35, 30, 40]
            }],
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            markers: {
                size: 0
            },
            colors: colors,
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }


        new ApexCharts(document.querySelector("#currency-eth-chart"), options2).render();

    }

    DashboardWallet.prototype.initDayBalance = function() {



        var colors = ["#6c757d"];
        var dataColors = $("#day-balance-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            colors: colors,
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
            },
            series: [{
                data: this.dayBalanceData
            },
            ],
            markers: {
                size: 0,
                style: 'hollow',
            },
            xaxis: {
                type: 'datetime',
                // min: new Date('01 Mar 2012').getTime(),
                tickAmount: 6,
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "$" + value;
                    }
                },
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0,
                    stops: [0, 100]
                }
            },

        }

        var chart = new ApexCharts(
            document.querySelector("#day-balance-chart"),
            options
        );

        chart.render();
    }

    DashboardWallet.prototype.initWeekBalance = function() {
        var colors = ["#6c757d"];
        var dataColors = $("#week-balance-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            colors: colors,
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
            },
            series: [{
                data: this.weekBalanceData
            },

            ],
            markers: {
                size: 0,
                style: 'hollow',
            },
            xaxis: {
                type: 'datetime',
                // min: new Date('01 Mar 2012').getTime(),
                tickAmount: 6,
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "$" + value;
                    }
                },
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0,
                    stops: [0, 100]
                }
            },

        }

        var chart = new ApexCharts(
            document.querySelector("#week-balance-chart"),
            options
        );

        chart.render();
    }

    DashboardWallet.prototype.initMonthBalance = function() {
        var colors = ["#6c757d"];
        var dataColors = $("#month-balance-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            colors: colors,
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
            },
            series: [{
                data: this.monthBalanceData
            },

            ],
            markers: {
                size: 0,
                style: 'hollow',
            },
            xaxis: {
                type: 'datetime',
                // min: new Date('01 Mar 2012').getTime(),
                tickAmount: 6,
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "$" + value;
                    }
                },
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0,
                    stops: [0, 100]
                }
            },

        }

        var chart = new ApexCharts(
            document.querySelector("#month-balance-chart"),
            options
        );

        chart.render();
    }

    DashboardWallet.prototype.initYearBalance = function() {
        var colors = ["#6c757d"];
        var dataColors = $("#year-balance-chart").data('colors');
        if (dataColors) {
            colors = dataColors.split(",");
        }
        var options = {
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            colors: colors,
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
            },
            series: [{
                data: this.yearBalanceData
            },

            ],
            markers: {
                size: 0,
                style: 'hollow',
            },
            xaxis: {
                type: 'datetime',
                // min: new Date('01 Mar 2012').getTime(),
                tickAmount: 6,
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "$" + value;
                    }
                },
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0,
                    stops: [0, 100]
                }
            },

        }

        var chart = new ApexCharts(
            document.querySelector("#year-balance-chart"),
            options
        );

        chart.render();
    }

    $.DashboardWallet = new DashboardWallet, $.DashboardWallet.Constructor = DashboardWallet
    $.DashboardWallet.init();
}(window.jQuery);
