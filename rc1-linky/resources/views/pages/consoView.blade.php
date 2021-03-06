@extends('layouts.master')

@section('content')
    <div class="wrapper">
        <body class="hold-transition skin-blue sidebar-mini">
        @include('navbar.navbarHeader')
        @include('navbar.navbarSidebar',['page'=>'consoView'])

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ma consommation
                        <small> - Visualisation</small>
                    </h1>
                </section>

                <section class="content">
                    <div class="col-md-12>">
                        <div class="box">
                            <div class="nav-tabs-custom">
                                <!-- Tabs within a box -->
                                <ul class="nav nav-tabs pull-right">
                                    <li class="pull-left header">Ma consommation</li>
                                </ul>
                                <div class="tab-content no-padding">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; max-height: 600px">
                                        <style>
                                            canvas {
                                                -moz-user-select: none;
                                                -webkit-user-select: none;
                                                -ms-user-select: none;
                                            }
                                        </style>
                                        <div class="chart">
                                            <div id="Graph_1" style="min-width: 310px; height: 100%; max-width: 100%; margin: 0 auto"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="box">
                                <div class="nav-tabs-custom " >
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="pull-left header">Consommation Type / 30 min par jours</li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; max-height: 600px">
                                            <style>
                                                canvas {
                                                    -moz-user-select: none;
                                                    -webkit-user-select: none;
                                                    -ms-user-select: none;
                                                }
                                            </style>
                                            <div class="chart">
                                                <div id="Graph_2" style="min-width: 310px; height: 100%; max-width: 100%; margin: 0 auto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="box">
                                <div class="nav-tabs-custom" >
                                    <!-- Tabs within a box -->
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="pull-left header">Ma consommation Type / actuelle</li>
                                    </ul>
                                    <div class="tab-content no-padding">
                                        <!-- Morris chart - Sales -->
                                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; max-height: 600px">
                                            <style>
                                                canvas {
                                                    -moz-user-select: none;
                                                    -webkit-user-select: none;
                                                    -ms-user-select: none;
                                                }
                                            </style>
                                            <div class="chart">
                                                <div id="Graph_3" style="min-width: 310px; height: 100%; max-width: 100%; margin: 0 auto"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </body>
    </div>


@endsection
@section('script')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script>
        var val1 = [];
        var data1 = {!! $data1 !!};
        for(var it in data1)
        {
            val1.push([new Date(data1[it].horodate), data1[it].value]);
        }

        Highcharts.stockChart('Graph_1', {


            rangeSelector: {
                    buttons: [{
                        type: 'month',
                        count: 1,
                        text: '1m',
                    }, {
                        type: 'month',
                        count: 3,
                        text: '3m'
                    }, {
                        type: 'month',
                        count: 6,
                        text: '6m'
                    }, {
                        type: 'ytd',
                        text: 'YTD'
                    }, {
                        type: 'year',
                        count: 1,
                        text: '1y'
                    }, {
                        type: 'all',
                        text: 'All'
                    }]

                //selected: 1
            },

            title: {
                text: 'Relevés'
            },
            xAxis: {
                type: 'datetime'
            },

            series: [{
                name: 'Relevé Kw/h ',
                data: val1,
                tooltip: {
                    valueDecimals: 2
                }
            }]
        });


        var GraphTimeConso0 = [];
        var GraphTimeConso1 = [];
        var GraphTimeConso2 = [];
        var GraphTimeConso3 = [];
        var GraphTimeConso4 = [];
        var GraphTimeConso5 = [];
        var GraphTimeConso6 = [];

        var GraphTimeConsoLab = [];
        var dat = {!! $GraphTimeConso !!};
        console.log({!! $GraphTimeConso !!});
        for(var it in dat)
        {
            if(dat[it].m_day == 0)
            {
                GraphTimeConso0.push([dat[it].m_time, dat[it].m_value]);
                GraphTimeConsoLab.push([dat[it].m_time]);
            }
            else if(dat[it].m_day == 1)
            {
                GraphTimeConso1.push([dat[it].m_time, dat[it].m_value]);
            }
            else if(dat[it].m_day == 2)
            {

                GraphTimeConso2.push([dat[it].m_time, dat[it].m_value]);
            }
            else if(dat[it].m_day == 3)
            {
                GraphTimeConso3.push([dat[it].m_time, dat[it].m_value]);
            }
            else if(dat[it].m_day == 4)
            {
                GraphTimeConso4.push([dat[it].m_time, dat[it].m_value]);
            }
            else if(dat[it].m_day == 5)
            {
                GraphTimeConso5.push([dat[it].m_time, dat[it].m_value]);
            }
            else if(dat[it].m_day == 6)
            {
                GraphTimeConso6.push([dat[it].m_time, dat[it].m_value]);
            }
        }
        console.log(GraphTimeConso0);
        console.log(GraphTimeConso1);
        console.log(GraphTimeConso2);
        console.log(GraphTimeConso3);
        console.log(GraphTimeConso4);
        console.log(GraphTimeConso5);
        console.log(GraphTimeConso6);




        Highcharts.chart('Graph_2', {
            chart: {
                type: 'column'
            },
            xAxis: {
                type: 'd',
                categories : GraphTimeConsoLab,
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Kw/h en %'
                }
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
            legend: {
                enabled: true
            },
            tooltip: {
                pointFormat: '{point.y:.1f} Kw/h'
            },
            series: [
                {
                name: 'lundi',
                data: GraphTimeConso0
                },
                {
                    name: 'mardi',
                    data: GraphTimeConso1
                },
                {
                    name: 'mercredi',
                    data: GraphTimeConso2
                },
                {
                    name: 'jeudi',
                    data: GraphTimeConso3
                },
                {
                    name: 'vendredi',
                    data: GraphTimeConso4
                },
                {
                    name: 'samedi',
                    data: GraphTimeConso5
                },
                {
                    name: 'dimanche',
                    data: GraphTimeConso6
                }
            ]
        });

        function getDayOfWeek(date) {
            var dayOfWeek = new Date(date).getDay();
            return isNaN(dayOfWeek) ? null : ['0', '1', '2', '3', '4', '5', '6'][dayOfWeek];
        }

        var PrevVals = [];
        var TypeVals = [];
        var graphMoy7Prev = {!! $graphMoy7Prev !!};
        var GraphType = {!! $GraphType !!};
        for(var it in graphMoy7Prev)
        {
            PrevVals.push([getDayOfWeek(graphMoy7Prev[it].m_date), graphMoy7Prev[it].m_value]);
        }
        for(var it in GraphType )
        {
            TypeVals.push([GraphType[it].m_day, GraphType[it].m_value]);
        }

        Highcharts.chart('Graph_3', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Lundi', 'Mardi', 'Mercredi','Jeudi','Vendredi','Samedi','Dimanche'
                ]
            },
            yAxis: [{
                min: 0,
                title: {
                    text: 'kw/h'
                }
            },
                {
                    title: {
                        text: 'Consommation / jours'
                    },
                    opposite: true
                }],
            legend: {
                shadow: false
            },
            tooltip: {
                shared: true
            },
            plotOptions: {
                column: {
                    grouping: false,
                    shadow: false,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Consommation Type',
                color: 'rgba(165,170,217,1)',
                data: TypeVals,
                pointPadding: 0.3,
            }, {
                name: 'Consommation des derniers jours',
                color: 'rgba(126,86,134,.9)',
                data: PrevVals,
                pointPadding: 0.4,
            }]
        });
    </script>
@endsection
