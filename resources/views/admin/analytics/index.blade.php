@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Analytics ')

@section('title','Analytics ')

@section('breadcrumb1', 'Analytics')

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
                <div class="col-12">
                <!-- Custom Tabs -->
                <div class="card card-danger card-outline">
                    <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">Tabs</h3>
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab_1" data-toggle="tab">Website</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab_2" data-toggle="tab">Social Media</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab_3" data-toggle="tab">Cotrack</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab_3" data-toggle="tab">Unclaimed Benefit</a>
                        </li>

                    </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">


                                    {{-- <div class="card-header d-flex p-0">
                                        <h3 class="card-title p-3">Tabs</h3>
                                        <ul class="nav nav-pills ml-auto p-2">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#statistics" data-toggle="tab">Statistics</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#location" data-toggle="tab">Location</a>
                        zz                    </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#tophundred" data-toggle="tab">Top Hundred</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#topmain" data-toggle="tab">ETC</a>
                                            </li>

                                        </ul>
                                    </div><!-- /.card-header --> --}}
                                    <div class="tab-content">

                                            <div class="tab-pane active" id="statitics">

                                                <!-- Info boxes -->
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

                                                        <div class="info-box-content">
                                                        <span class="info-box-number">
                                                            {{ number_format($Total->count()) }}
                                                            <small></small>
                                                        </span>
                                                        <span class="info-box-text">Total Website Visitors</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                    <div class="info-box mb-3">
                                                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

                                                        <div class="info-box-content">
                                                        <span class="info-box-text">Unique Client IP Address </span>
                                                        <span class="info-box-number">{{ number_format($clientIP->count()) }}</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->

                                                    <!-- fix for small devices only -->
                                                    <div class="clearfix hidden-md-up"></div>

                                                    <div class="col-12 col-sm-6 col-md-3">
                                                    <div class="info-box mb-3">
                                                        <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-shopping-cart"></i></span>

                                                        <div class="info-box-content">
                                                        <span class="info-box-text">Todays Visitors</span>
                                                        <span class="info-box-number">760</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                    <div class="info-box mb-3">
                                                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                                                        <div class="info-box-content">
                                                        <span class="info-box-text">New Members</span>
                                                        <span class="info-box-number">2,000</span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                <div class="row mt-3" >

                                                    <div class="col-md-12">

                                                            <div class="card card-danger">
                                                                    <div class="card-header">
                                                                        <div class="col-md">
                                                                            <h2 class="card-title">Website Visits List</h2>
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

                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th score="col">Ip Address</th>

                                                                                        <th score="col">Country Name</th>

                                                                                        <th score="col">Region Name</th>
                                                                                        <th score="col">City Name</th>
                                                                                        <th score="col">Latitude</th>
                                                                                        <th score="col">Longitude</th>
                                                                                        <th score="col">Created At</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        @foreach ($analytics as $analytic )
                                                                                        <tr>

                                                                                            <td>{{ $loop->index + 1 }}</td>
                                                                                            <td>{{ $analytic->ipAddress }}</td>

                                                                                            <td>{{ $analytic->countryName }}</td>

                                                                                            <td>{{ $analytic->regionName }}</td>
                                                                                            <td>{{ $analytic->cityName }}</td>
                                                                                            <td>{{ $analytic->latitude }}</td>
                                                                                            <td>{{ $analytic->longitude }}</td>
                                                                                            <td>{{ $analytic->created_at }}</td>

                                                                                        </tr>
                                                                                        @endforeach

                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th score="col">Ip Address</th>

                                                                                        <th score="col">Country Name</th>

                                                                                        <th score="col">Region Name</th>
                                                                                        <th score="col">City Name</th>
                                                                                        <th score="col">Latitude</th>
                                                                                        <th score="col">Longitude</th>
                                                                                        <th score="col">Created At</th>

                                                                                    </tr>
                                                                                </tfoot>
                                                                            </table>

                                                                    </div>

                                                                    <div class="card-footer">
                                                                            <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                                                                {{ $analytics->links() }}
                                                                            </div>
                                                                    </div>
                                                                    {{-- {!! $chart->container() !!} --}}

                                                                </div>
                                                        <!-- /.card -->

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                        <div class="card card-danger">
                                                                <div class="card-header">
                                                                    <div class="col-md">
                                                                        <h2 class="card-title">Daily</h2>
                                                                    </div>
                                                                    <div class="col-md">

                                                                    </div>
                                                                </div>

                                                                <div class="card-body table-responsive">


                                                                    <div id="liveone"></div>

                                                                </div>

                                                                <div class="card-footer">
                                                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                        </div>
                                                                </div>


                                                        </div>
                                                        <!-- /.card -->

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="card card-danger">
                                                                <div class="card-header">
                                                                    <div class="col-md">
                                                                        <h2 class="card-title">Daily Current Month</h2>
                                                                    </div>
                                                                    <div class="col-md">

                                                                    </div>
                                                                </div>

                                                                <div class="card-body table-responsive">

                                                                    {!! $chart->container() !!}

                                                                </div>

                                                                <div class="card-footer">
                                                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                        </div>
                                                                </div>


                                                        </div>
                                                        <!-- /.card -->

                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">

                                                            <div class="card card-danger">
                                                                    <div class="card-header">
                                                                        <div class="col-md">
                                                                            <h2 class="card-title"><i class="fa fa-line-chart"></i> From 2017-10-11 to Current Year</h2>
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

                                                                    <div class="card-footer">
                                                                            <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                            </div>
                                                                    </div>


                                                                </div>
                                                    <!-- /.card -->

                                                    </div>

                                                    <div class="col-md-6">

                                                        <div class="card card-danger">
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

                                                                    {!! $barchart->container() !!}

                                                                </div>

                                                                <div class="card-footer">
                                                                        <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                        </div>
                                                                </div>


                                                            </div>
                                                        <!-- /.card -->

                                                    </div>

                                                </div>
                                                <!-- /.row -->

                                                <div class="row">

                                                        <div class="col-md-6">

                                                                <div class="card card-danger">
                                                                        <div class="card-header">
                                                                            <div class="col-md">
                                                                                <h2 class="card-title">
                                                                                    <i class="fa fa-bar-chart"></i> From 2017-10-11 to Current Year
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


                                                                            {!! $bardata->container() !!}


                                                                        </div>

                                                                        <div class="card-footer">
                                                                                <div class="col-md-12 d-flex justify-content-center pt-5 ">

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

                                                                        {!! $piechart->container() !!}


                                                                    </div>

                                                                    <div class="card-footer">
                                                                            <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                            </div>
                                                                    </div>


                                                                </div>
                                                            <!-- /.card -->

                                                        </div>

                                                </div>


                                            </div>

                                            <div class="tab-pane" id="location">
                                                    The European languages are members of the same family. Their separate existence is a myth.
                                                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                                    new common language would be desirable: one could refuse to pay expensive translators.
                                            </div>
                                            <div class="tab-pane" id="tophundred">
                                                    The European languages are members of the same family. Their separate existence is a myth.
                                                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                                    new common language would be desirable: one could refuse to pay expensive translators.
                                            </div>
                                            <div class="tab-pane" id="topmain">
                                                    The European languages are members of the same family. Their separate existence is a myth.
                                                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                                    new common language would be desirable: one could refuse to pay expensive translators.
                                            </div>

                                    </div>





                            </div>
                            <!-- /.tab-pane -->


                            <div class="tab-pane" id="tab_2">
                                The European languages are members of the same family. Their separate existence is a myth.
                                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                new common language would be desirable: one could refuse to pay expensive translators. To
                                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                                words. If several languages coalesce, the grammar of the resulting language is more simple
                                and regular than that of the individual languages.
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                It has survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                            <!-- /.tab-pane -->


                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- END CUSTOM TABS -->
            <!-- START PROGRESS BARS -->

        </div>

    </div>
    <!-- /.content -->

@endsection
@section('chartsscripts')

      <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>'

    <script src="{{ asset('admin/dist/js/pages/dashboard3.js') }}"></script>

    <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
    {!! $barchart->script() !!}
    {!! $piechart->script() !!}

    {!! $chart->script() !!}
    {!! $line->script() !!}

    {!! $bardata->script() !!}
    {!! $barcode->script() !!}

    <script>

      var chart;

        function requestData() {
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
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
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Todays Time',
                    data: [],

                }]


            });
        });

    </script>

@endsection


