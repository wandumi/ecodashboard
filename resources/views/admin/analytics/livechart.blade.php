@extends('admin.layouts.app')


@section('browsertitle', 'Ecodashboard | Live Chart')

@section('title','Live Chart')

@section('breadcrumb1', 'Live Chart')

@section('breadcrumb2', 'View')


@section('content')
<!-- Main content -->
      <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">

                        <div class="card card-success">
                                <div class="card-header">
                                    <div class="col-md">
                                        <h2 class="card-title"><i class="fa fa-line-chart"></i> Monthly</h2>
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
                                    <h2 class="card-title"><i class="fa fa-bar-chart"></i> Annually</h2>
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


                                    <canvas id="myChart" height="100"></canvas>

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
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/chart.js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/dashboard3.js') }}"></script>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

    <script>
        let ctx = document.getElementById("myChart");

        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Online'],
                datasets: [{
                    label: '# of Users',
                    data: [3],
                    borderWidth: 1
                }]
            }
        });


    </script>
    <script>
            /**
        * Request data from the server, add it to the graph and set a timeout
        * to request again
        */

            function requestData() {
                $.ajax({
                    type: 'get',
                    url: 'http://ecodashboard.test/livechart/chart',
                    datatype: 'json',
                    success: function(point) {
                        console.log(point);
                        var series = chart.series[0],
                            shift = series.data.length > 20; // shift if the series is
                                                            // longer than 20

                        // add the point
                        chart.series[0].addPoint(point, true, shift);

                        // call it again after one second
                        setTimeout(requestData, 1000);
                    },
                    cache: false
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                chart = Highcharts.chart('livethree', {
                    chart: {
                        type: 'spline',
                        events: {
                            load: requestData
                        }
                    },
                    title: {
                        text: 'Live random data'
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
                            text: 'Value',
                            margin: 80
                        }
                    },
                    series: [{
                        name: 'Random data',
                        data: []
                    }]
                });
            });

        </script>
@endsection




