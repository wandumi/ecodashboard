@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Web Visit Graphs')

@section('title','Analyse Website Visits')

@section('breadcrumb1', 'Analysis')

@section('breadcrumb2', 'View')

@section('headassest')
    <!-- Theme style -->
   <link rel="stylesheet" href="">
   {{-- <script src="{{ asset('node_modules/plotly.js-dist/plotly.js') }}"></script> --}}
   <!-- OR an un-minified version is also available -->
   <script src="https://cdn.plot.ly/plotly-latest.js" charset="utf-8"></script>
   <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

  <!-- highchart link -->
  <script src="https://code.highcharts.com/stock/highstock.js"></script>
  <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>


  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

@endsection

@section('content')
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">

                        <div class="card card-success">
                                <div class="card-header">
                                    <div class="col-md">
                                        <h2 class="card-title"><i class="fa fa-line-chart"></i> Today <a href="https://pdf-ace.com/pdfme/" target= "_blank">Save as PDF</a></h2>
                                    </div>
                                    <div class="col-md">
                                        <!-- Button trigger modal -->
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#user">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </button> --}}
                                    </div>
                                </div>

                                <div class="card-body table-responsive">

                                        {{-- <canvas id="myChart"></canvas> --}}
                                        <div id="chart"></div>


                                </div>

                                {{-- <div class="card-footer">
                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                            {{ $analytics->links() }}
                                        </div>
                                </div> --}}
                                {{-- {!! $chart->container() !!} --}}

                            </div>
                <!-- /.card -->

                </div>

                <div class="col-md-6">

                    <div class="card card-info">
                            <div class="card-header">
                                <div class="col-md">
                                    <h2 class="card-title"><i class="fa fa-bar-chart"></i> From 2017-10-11 to Current Year</h2>
                                </div>
                                <div class="col-md">
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#user">
                                        add New <i><span class="fa fa-user"></span></i>
                                    </button> --}}
                                </div>
                            </div>

                            <div class="card-body table-responsive">


                                {!! $barcode->container() !!}

                            </div>

                            {{-- <div class="card-footer">
                                    <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                        {{ $analytics->links() }}
                                    </div>
                            </div> --}}
                            {{-- {!! $chart->container() !!} --}}

                        </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->

            <div class="row">

                    <div class="col-md-6">

                            <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="col-md">
                                            <h2 class="card-title">
                                                <i class="fa fa-bar-chart"></i> Current Month
                                            </h2>
                                        </div>
                                        <div class="col-md">
                                            <!-- Button trigger modal -->
                                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#user">
                                                add New <i><span class="fa fa-user"></span></i>
                                            </button> --}}
                                        </div>
                                    </div>

                                    <div class="card-body table-responsive">

                                            {!! $chart->container() !!}


                                    </div>

                                    <div class="card-footer">
                                            <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                                {{-- {{ $analytics->links() }} --}}
                                                <h3>As from 03 June 2019 TO 01 May 2019</h3>
                                            </div>
                                    </div>
                                    {{-- {!! $chart->container() !!} --}}

                                </div>
                    <!-- /.card -->

                    </div>

                    <div class="col-md-6">

                        <div class="card card-danger">
                                <div class="card-header">
                                    <div class="col-md">
                                        <h2 class="card-title"><i class="fa fa-pie-chart"></i> Current Year</h2>
                                    </div>
                                    <div class="col-md">
                                        <!-- Button trigger modal -->
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#user">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </button> --}}
                                    </div>
                                </div>

                                <div class="card-body table-responsive">


                                        {!! $barchart->container() !!}

                                </div>

                                {{-- <div class="card-footer">
                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                            {{ $analytics->links() }}
                                        </div>
                                </div> --}}
                                {{-- {!! $chart->container() !!} --}}

                            </div>
                        <!-- /.card -->

                    </div>

            </div>

            <!-- /.row -->
            <div class="row">

                    <div class="col-md-12">

                        <div class="card card-danger">
                                <div class="card-header">
                                    <div class="col-md">
                                        <h2 class="card-title"><i class="fa fa-pie-chart"></i> Live Chart</h2>
                                    </div>
                                    <div class="col-md">
                                        <!-- Button trigger modal -->
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#user">
                                            add New <i><span class="fa fa-user"></span></i>
                                        </button> --}}
                                    </div>
                                </div>

                                <div class="card-body table-responsive">

                                    <div id="liveone"></div>


                                </div>

                                {{-- <div class="card-footer">
                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                            {{ $analytics->links() }}
                                        </div>
                                </div> --}}
                                {{-- {!! $chart->container() !!} --}}

                            </div>
                        <!-- /.card -->

                    </div>

                </div>
                <!-- /.row -->







        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
@endsection
@section('chartsscripts')

      <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('admin/plugins/jquery/jquery-min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/dashboard3.js') }}"></script>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! $chart->script() !!}
    {!! $line->script() !!}
    {!! $barchart->script() !!}
    {!! $barcode->script() !!}

    {{-- <script>
        getData();

        async function getData() {
            const retrieve = await fetch('http://ecodashboard.test/livechart/chart');
            const data = await retrieve.text();

            console.log(data);
        }
    </script> --}}

    <script>
        $(document).ready(function() {
            var url = "http://ecodashboard.test/livechart/chart";
            // console.log(url);
            // $.getJSON(url, function(response){
            //     console.log(response);
            //     var statusHTML = '<ul class="bulleted">';
                // $.ecah(statusHTML).function()
                function showGraph()
                {
                    {
                        $.getJSON(url, function (response)
                        {
                            console.log(data);
                            var name = [];
                            var marks = [];

                            for (var i in data) {
                                name.push(data[i].student_name);
                                marks.push(data[i].marks);
                            }

                            var chartdata = {
                                labels: name,
                                datasets: [
                                    {
                                        label: 'Student Marks',
                                        backgroundColor: '#49e2ff',
                                        borderColor: '#46d5f1',
                                        hoverBackgroundColor: '#CCCCCC',
                                        hoverBorderColor: '#666666',
                                        data: marks
                                    }
                                ]
                            };

                            var graphTarget = $("livethree");

                            var barGraph = new Chart(graphTarget, {
                                type: 'bar',
                                data: chartdata
                            });
                        });
                    }
                }
            });
    </script>

    <script>
            /**
        * Request data from the server, add it to the graph and set a timeout
        * to request again
        */
        var chart;

            function requestData() {
                $.ajax({
                    type: 'get',
                    url: 'http://ecodashboard.test/livechart/chart',
                    datatype: 'json',
                    success: function(point) {
                        console.log(point);
                        console.log(chart);
                        var series = chart.series[0],
                            shift = series.data.length > 100; // shift if the series is
                                                            // longer than 20

                        //Get the time
                        var dt = new Date();
                        var x = dt.setHours( dt.getHours() + 2 );

                        //add the data from the database
                        var y = point;

                        // add the point
                        chart.series[0].addPoint([x,y], true, shift);

                        // call it again after one second
                        setTimeout(requestData, 1000);

                    },
                    cache: false
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                chart = Highcharts.stockChart('liveone', {
                    chart: {
                        type: 'spline',
                        events: {
                            load: requestData
                        }
                    },
                    title: {
                        text: 'Todays Website Visits'
                    },
                    xAxis: {
                        type: 'datetime',
                        tickPixelInterval: 150,
                        maxZoom: 20 * 1000

                    },
                    yAxis: {
                        minPadding: 0.2,
                        maxPadding: 0.2,
                        title: {
                            text: 'Number of Visits',
                            margin: 80
                        }
                    },

                    rangeSelector: {
                        buttons: [{
                            count: 1,
                            type: 'minute',
                            text: '1M'
                        }, {
                            count: 5,
                            type: 'minute',
                            text: '5M'
                        }, {
                            type: 'all',
                            text: 'All'
                        }],
                        inputEnabled: true,
                        selected: 0
                    },

                    title: {
                        text: 'Today Visits'
                    },

                    exporting: {
                        enabled: false
                    },

                    series: [{
                        name: 'Todays Time',
                        data: [],

                    }]
                });
            });

    </script>

    <script>
        /**
        * Load new data depending on the selected min and max
        */
        // function afterSetExtremes(e) {

        //     var chart = Highcharts.charts[0];

        //     chart.showLoading('Loading data from server...');

        //     // $.getJSON('https://www.highcharts.com/samples/data/from-sql.php?start=' + Math.round(e.min) +
        //     //         '&end=' + Math.round(e.max) + '&callback=?', function (data) {

        //     $.getJSON('http://ecodashboard.test/livechart/chart', function (data) {

        //         chart.series[0].setData(data);

        //         chart.hideLoading();
        //     });



        // }

        function afterSetExtremes(e) {
            // var chart = Highcharts.charts[0];

            // chart.showLoading('Loading data from server...');

                $.ajax({
                    type: 'get',
                    url: 'http://ecodashboard.test/livechart/chart',
                    datatype: 'json',
                    success: function(data) {
                        console.log(data);

                        // chart.series[0].setData(point);

                        // chart.hideLoading();

                        var series = chart.series[0],
                            shift = series.data.length > 100; // shift if the series is
                                                            // longer than 20

                        //Get the time
                        var dt = new Date();
                        var x = dt.setHours( dt.getHours() + 2 );

                        //add the data from the database
                        var y = data;

                        // add the point
                        chart.series[0].addPoint([x,y], true, shift);

                        // call it again after one second
                        setTimeout(requestData, 1000);

                    },
                    cache: false
                });
            }

        // See source code from the JSONP handler at https://github.com/highcharts/highcharts/blob/master/samples/data/from-sql.php
        // $.getJSON('http:ecodashboard.test/livechart/charttwo',

        $.ajax({
                type: 'get',
                url: 'http://ecodashboard.test/livechart/charttwo',
                datatype: 'json',
                success: function (data) {
                    console.log(data);

                    // Add a null value for the end date
                    data = [].concat(data, [ data[Date.UTC(2019), null, null, null, null]] );

                    // create the chart
                    Highcharts.stockChart('mapping', {
                        chart: {
                            type: 'candlestick',
                            zoomType: 'x'
                        },

                        navigator: {
                            adaptToUpdatedData: false,
                            series: {
                                data: data
                            }
                        },

                        scrollbar: {
                            liveRedraw: false
                        },

                        title: {
                            text: 'AAPL history by the minute from 1998 to 2011'
                        },

                        subtitle: {
                            text: 'Displaying 1.7 million data points in Highcharts Stock by async server loading'
                        },

                        rangeSelector: {
                            buttons: [{
                                type: 'hour',
                                count: 1,
                                text: '1h'
                            }, {
                                type: 'day',
                                count: 1,
                                text: '1d'
                            }, {
                                type: 'month',
                                count: 1,
                                text: '1m'
                            }, {
                                type: 'year',
                                count: 1,
                                text: '1y'
                            }, {
                                type: 'all',
                                text: 'All'
                            }],
                            inputEnabled: false, // it supports only days
                            selected: 4 // all
                        },

                        xAxis: {
                            events: {
                                afterSetExtremes: afterSetExtremes
                            },
                            minRange: 3600 * 1000 // one hour
                        },

                        yAxis: {
                            floor: 0
                        },

                        series: [{
                            data: data,
                            dataGrouping: {
                                enabled: false
                            }
                        }]
                    });

                }
        });
    </script>

    <script>
        var chart;

            function requestData() {
                $.ajax({
                    type: 'get',
                    url: 'http://ecodashboard.test/livechart/chart',
                    datatype: 'json',
                        success: function(point) {
                            console.log(point);
                            var series = chart.series[0],
                                shift = series.data.length > 100; // shift if the series is
                                                                // longer than 20

                            //Get the time
                            var dt = new Date();
                            var x = dt.setHours( dt.getHours() + 2 );

                            //add the data from the database
                            var y = point;

                            // add the point
                            chart.series[0].addPoint([x,y], true, shift);

                            // call it again after one second
                            setTimeout(requestData, 1000);

                        },
                        cache: false
                });
            }
        // Create the chart
        Highcharts.stockChart('combined', {
            chart: {
                events: {
                    load: requestData
                }
            },

            time: {
                useUTC: false
            },

            rangeSelector: {
                buttons: [{
                    count: 1,
                    type: 'minute',
                    text: '1M'
                }, {
                    count: 5,
                    type: 'minute',
                    text: '5M'
                }, {
                    type: 'all',
                    text: 'All'
                }],
                inputEnabled: false,
                selected: 0
            },

            title: {
                text: 'Todays Visitors'
            },

            exporting: {
                enabled: false
            },

            series: [{
                name: 'Random data',
                data: []
            }]
        });
    </script>

@endsection




