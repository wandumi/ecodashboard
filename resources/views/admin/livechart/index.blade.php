
@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Analytics ')

@section('title','Analytics ')

@section('headassest')
    <script src="https://code.highcharts.com/highcharts.js"></script>


    <!-- Example of loading from CDNJS: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script>

    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
            integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
            crossorigin=""></script> --}}



@endsection

@section('breadcrumb1', 'Analytics')

@section('breadcrumb2', 'View')




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



                                    <div class="tab-content">

                                            <div class="tab-pane active" id="statitics">

                                                <!-- Info boxes -->
                                                <div class="row mt-3">
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                    <div class="info-box">
                                                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

                                                        <div class="info-box-content">
                                                        <span class="info-box-number">
                                                            {{-- {{ number_format($Total->count()) }} --}}
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
                                                        {{-- <span class="info-box-number">{{ number_format($clientIP->count()) }}</span> --}}
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
                                                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

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

                                                            <div class="card card-danger card-outline">
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

                                                                        <div id="container" style="width:100%; height:400px;"></div>

                                                                    </div>

                                                                    <div class="card-footer">
                                                                            <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                            </div>
                                                                    </div>
                                                                    {{-- {!! $chart->container() !!} --}}

                                                                </div>
                                                        <!-- /.card -->

                                                    </div>


                                                </div>
                                                <div class="row mt-3" >

                                                        <div class="col-md-12">

                                                                <div class="card card-danger card-outline">
                                                                        <div class="card-header">
                                                                            <div class="col-md">
                                                                                <h2 class="card-title">Map </h2>
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

                                                                            {{-- <canvas id="map" height="800" width="600"></canvas> --}}
                                                                            <div id="mine"></div>

                                                                        </div>

                                                                        <div class="card-footer">
                                                                                <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                                </div>
                                                                        </div>
                                                                        {{-- {!! $chart->container() !!} --}}

                                                                    </div>
                                                            <!-- /.card -->

                                                        </div>

                                                        <div class="col-md-12">

                                                                <div class="card card-danger card-outline">
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



                                                                        </div>

                                                                        <div class="card-footer">
                                                                                <div class="col-md-12 d-flex justify-content-center pt-5 ">

                                                                                </div>
                                                                        </div>
                                                                        {{-- {!! $chart->container() !!} --}}

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

    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

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
                        var y = point;
                        // console.log(x);

                        // add the point
                        chart.series[0].addPoint([x,y], true, shift);

                        // call it again after one second
                        setTimeout(requestData, 1000);

                    },
                    cache: false
                });
            }

            document.addEventListener('DOMContentLoaded', function() {
                 chart = Highcharts.chart('container', {
                    chart: {
                        type: 'spline',
                        events: {
                            load: requestData
                        },
                        zoomType: 'x'
                    },
                    title: {
                        text: 'Todays Website Visits'
                    },
                    xAxis: {
                        type: 'datetime',
                        tickPixelInterval: 150,
                        maxZoom: 10 * 1000,


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

    <script>

        const mymap = L.map('mine').setView([0,0], 5);
        // const langlong = L.marker([0, 0]).addTo(mymap);

        // saying this  tiles are comming from open sorce
        const attribution = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors';
        const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

        //The create the tile of the map
        const tiles = L.tileLayer (tileUrl, { attribution });
              //add to the page
              tiles.addTo(mymap);

        const api_url = 'http://ecodashboard.test/livechart/map';

        async function getCordinates () {

            const response = await fetch(api_url);

            //Turn the data from the string to JSON
            const data = await response.json();

            const longitude_data = [];
            const latitude_data = [];

             for (i = 0; i < 1000; i++) {

                latitude_data.push(data[i].latitude);
                longitude_data.push(data[i].longitude);

                L.marker( [
                    parseFloat(latitude_data[i]),
                    parseFloat(longitude_data[i])
                ]).addTo(mymap);

             }


            // const  { latitude, longitude } = data;
            // console.log(data);


            // langlong.setLatLng([latitude, longitude]);

            // document.getElementById('result').textContent = latitude;
            // document.getElementById('lon').textContent = longitude;

        }

        getCordinates();
    </script>
@endsection
