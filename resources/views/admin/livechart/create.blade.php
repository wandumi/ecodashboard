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

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/maps/highmaps.js"></script>

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

                                    {{-- <canvas id="myChart"></canvas> --}}
                                    <div id="live"></div>


                                </div>

                                <div class="card-footer">
                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                            {{-- {{ $analytics->links() }} --}}
                                            {{-- <h3>As from 03 June 2019 TO 01 May 2019</h3> --}}
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

                                <div id="plot"></div>


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
            <!-- /.row -->
            <div class="row">

                    <div class="col-md-6">

                            <div class="card card-primary">
                                    <div class="card-header">
                                        <div class="col-md">
                                            <h2 class="card-title">
                                                <i class="fa fa-bar-chart"></i> Map
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

                                        {{-- <canvas id="myChart"></canvas> --}}
                                        <div id="mapping"></div>


                                    </div>



                                </div>
                    <!-- /.card -->

                    </div>

                    <div class="col-md-6">

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


          </div>

          <!-- /.row -->
          <div class="row">

                <div class="col-md-6">

                        <div class="card card-primary">
                                <div class="card-header">
                                    <div class="col-md">
                                        <h2 class="card-title">
                                            <i class="fa fa-bar-chart"></i> Map 2
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

                                    {{-- <canvas id="myChart"></canvas> --}}
                                    <div id="mapping"></div>


                                </div>



                            </div>
                <!-- /.card -->

                </div>

                <div class="col-md-6">

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

                                <div id="container">


                                </div>


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


          </div>

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



    <script>

        $(function() {
                var time = new Date(2019-05-30);

                Plotly.plot('chart', [{
                                x: [time],
                                y:[ 600 ],
                                type:'line'
                            }]);

                setInterval(function(){


                    $.ajax({
                            type:'GET',
                            url:'http://ecodashboard.test/livechart/chart',
                            dataType: 'json',
                            // data:{name:name, password:password, email:email},
                            // data:url,
                            success:function(data){

                                var cnt = 0;
                                var time = new Date();

                                var player = [];
                                var score = [];

                                for(var i in data) {
                                    player.push("Player " + data[i].playerid);
                                    score.push(data[i].score);
      }

                                Plotly.extendTraces('chart', { y:[[ data ]]},  [1]);

                                cnt++;

                                // if(cnt > 2) {
                                //     Plotly.relayout('chart',{
                                //             xaxis: {
                                //                   range: [time];
                                //                 }
                                //     });
                                // }

                            }
                        });

                },1000);
        });

    </script>

    <script>
        var data = [
            {
                x: ['2013-10-04 22:23:00', '2013-11-04 22:23:00', '2013-12-04 22:23:00'],
                y: [1, 3, 6],

                type: 'scatter'
            }
        ];

        var layout = {
            title: ' A Line Chart in Plotly'
        };

        Plotly.newPlot('live', data, layout);

    </script>
    {{-- <script>
        getData();

        async function getData() {
            const retrieve = await fetch('http://ecodashboard.test/livechart/chart');
            const data = await retrieve.text();

            console.log(data);
        }
    </script> --}}
    <script>
        var lineDiv = document.getElementById('plot');

        var traceA = {
            x: [1,2,3,4,5,6],
            y: [1,42,15,6,18,10],
            type: 'bar',
            name: 'Yesterday Visites',
            line: {
                shape: 'linear',
                color: 'blue',
                dash: 'dot',
                fill: 'tonexty',
                marker: {
                    symbol: 'diamond',
                    size: 10
                },
                width: 3
            }
        };

        var traceB = {
            x: [1,2,3,4,5,6],
            y: [10,2,45,9,28,10],
            type: 'scatter',
            name: 'Today Visits',
        };

        var data = [traceA, traceB];

        var layout = {
            title:'A Line Chart in Plotly',
            // height: 550,
            font: {
                family: 'Lato',
                size: 16,
                color: 'rgb(100,150,200)'
            },

            plot_bgcolor: 'rgba(200,255,0,0.1)',
            margin: {
                pad: 5
            },

            xaxis: {
                title: 'Distance travelled along x-axis',
                titlefont: {
                    color: 'black',
                    size: 12
                },
                rangemode: 'tozero'
            },

            yaxis: {
                title: 'Distance travelled along y-axis',
                titlefont: {
                    color: 'black',
                    size: 12
                },

                rangemode: 'tozero'
            }
        };

        // var layout = {
        //     title:'Nominal GDP Sector Composition of Top 8 Countries',
        //     barmode: 'stack'
        // };

        Plotly.plot( lineDiv, data, layout);

    </script>

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
                    var series = chart.series[0],
                        shift = series.data.length > 1000; // shift if the series is
                                                        // longer than 20

                    var dt = new Date();

                     var x = dt.setHours( dt.getHours() + 2 );
                    // var x = ( new Date() ).getTime(); // current time
                    // var x = new Date(+2);
                    var y = point;
                    console.log(x);

                    // add the point
                    chart.series[0].addPoint([x,y], true, shift);

                    // call it again after one second
                    setTimeout(requestData, 1000);

                },
                cache: false
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
             chart = Highcharts.chart('liveone', {
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
                series: [{
                    name: 'Todays Time',
                    data: [],

                }]
            });
        });

</script>


@endsection




