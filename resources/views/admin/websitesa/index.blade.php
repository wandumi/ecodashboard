@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Analytics ')

@section('title','Analytics ')

@section('breadcrumb1', 'Analytics')

@section('breadcrumb2', 'View')

@section('headassest')
    <style>
        .modal-body {
           max-height:60vh;
           padding-bottom: 20px;
        }
    </style>
    <!-- Theme style -->
    <link rel="stylesheet" href="">
    {{-- <script src="{{ asset('node_modules/plotly.js-dist/plotly.js') }}"></script> --}}
    <!-- OR an un-minified version is also available -->
    <script src="https://cdn.plot.ly/plotly-latest.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>


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
                <div class="col-12">
                    <!-- Custom Tabs -->
                    <div class="card card-danger card-outline">


                        <div class="tab-pane active" id="statitics">

                            <!-- Info boxes -->
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Website Visitors</span>
                                            <span class="info-box-number">
                                            {{ number_format($Total->count()) }}
                                            <small></small>
                                        </span>

                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-address-card"></i></span>

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
                                            <span class="info-box-number">{{ $Today->count() }}</span>
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
                                            <span class="info-box-number"></span>
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
                                            <div>$analytics->count()</div>
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th score="col">Ip Address</th>
                                                    <th score="col">Location</th>
                                                    <th score="col">Date</th>
                                                    <th score="col">Time
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($analytics as $analytic )
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $analytic->ipAddress }}</td>
                                                        <td>{{ $analytic->cityName }}</td>
                                                        <td>{{ date ('M j, Y', strtotime($analytic->created_at)) }}</td>
                                                        <td>{{ date ('H:i a ', strtotime($analytic->created_at)) }}</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th score="col">Ip Address</th>
                                                    <th score="col">Location</th>
                                                    <th score="col">Date</th>
                                                    <th score="col">Time</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-3"></div>
                                                <div class="col-3 d-flex justify-content-center pt-5">
                                                    <p>{{ $analytics->onEachSide(2)->links() }}</p>
                                                </div>
                                                <div class="col-3"></div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card -->

                                </div>

                            </div>
                            
                            <div class="row">
                                
                                    <div class="modal fade" id="modal-lg">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Extra Large Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body pb-3">
                                                    <p>&hellip;</p>
                                                <div class="col-md-12">
                                                        
                                                </div>
                                                {!! $line->container() !!}
                                                
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    


                                <div class="col-md-6">

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <div class="col-md d-flex">
                                                <h2 class="card-title"> Today's Visitors </h2>
                                                <h2 class="card-title ml-auto"> {{ \Carbon\Carbon::now(2)->toDateString() }} </h2>
                                                <h2 class="card-title ml-auto">Total: {{ $Today->count() }}</h2>
                                            </div>
                                            <div class="col-md">

                                            </div>
                                        </div>

                                        <div class="card-body table-responsive">


                                            <div id="liveone"></div>


                                        </div>

                                        <div class="card-footer">
                                            <div class="col-md-12 d-flex justify-content-center pt-5 ">
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                                                        Launch Extra Large Modal
                                                    </button>
                                            </div>

                                        </div>


                                    </div>
                                    <!-- /.card -->

                                </div>

                                <div class="col-md-6">

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <div class="col-md d-flex">
                                                <h2 class="card-title">Current Month's Visits</h2>
                                                <h2 class="card-title ml-auto">Total: {{ $month->count() }}</h2>

                                            </div>
                                            <div class="col-md">

                                            </div>
                                        </div>

                                        <div class="card-body table-responsive">

                                            <div id="mine"></div>

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
                                            <div class="col-md d-flex">
                                                <h2 class="card-title"><i class="fa fa-line-chart"></i> From 2017-10-11 to Current Year</h2>
                                                <h2 class="card-title ml-auto">Total: {{ $month->count() }}</h2>
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

                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card -->

                                </div>

                                <div class="col-md-6">

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <div class="col-md d-flex">
                                                <h2 class="card-title"><i class="fa fa-bar-chart"></i> From 2017-10-11 to Current Year</h2>
                                                <h2 class="card-title ml-auto">Total: {{ number_format($Total->count()) }}</h2>
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

                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <div class="col-md d-flex">
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

                                            {!! $barchart->container() !!}



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

                            <div class="row">

                                    <div class="col-md-6">
    
                                        <div class="card card-danger">
                                            <div class="card-header">
                                                <div class="col-md d-flex">
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
    
                                                <div id="piechart"></div>
    
    
    
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
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
   
    {{-- <script src="{{ asset('admin/dist/js/pages/dashboard3.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset=utf-8></script>
    {!! $barchart->script() !!}
    {!! $piechart->script() !!}

    {!! $chart->script() !!}
    {!! $line->script() !!}

    {!! $bardata->script() !!}
    {!! $barcode->script() !!}
    
    {{--<script>
        $('#modal-lg').on('show.bs.modal', function () {
            $('.modal-content').css('max-height',$( window ).height()*0.8);
            $('.modal-content img').css('max-height',(($( window ).height()*0.8)-86));
        });
    </script> --}}

    
    <script>
        const ctx = document.getElementById('piechart').getContext('2d');
        const xlabels = [];
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Visitors',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        const api_url = 'http://ecodashboard.test/livechart/chart';
        async function getData() {
            const response = await fetch(api_url);
            const data = await response.json()

            console.log(data);
            
        }

        getData();
    </script>


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
                        shift = series.data.length > 100; // shift if the series is
                    // longer than 20

                    var dt = new Date();

                    var x = dt.setHours( dt.getHours() + 2 );

                    var y = point;
                    // console.log(x);

                    // add the point
                    chart.series[0].addPoint([x,y], true, shift);

                    // call it again after five second
                    setTimeout(requestData, 5000);
                    //setInterval(requestData, 300000);

                },
                cache: false
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            chart = Highcharts.stockChart ( 'liveone', {
                chart: {
                    type: 'spline',
                    events: {
                        load: requestData
                    }
                },
                title: {
                    text: 'Todays Visitors'
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
                        margin: 20
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
                    inputEnabled: false,
                    selected: 0
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



    <!-- This is the map script 
    <script> 

        {{--const mymap = L.map('mine').setView([-26.2042,28.0473], 5);--}}
        {{--// const langlong = L.marker([0, 0]).addTo(mymap);--}}

        {{--// saying this  tiles are comming from open sorce--}}
        {{--const attribution = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors';--}}
        {{--const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';--}}

        {{--//The create the tile of the map--}}
        {{--const tiles = L.tileLayer (tileUrl, { attribution });--}}
        {{--//add to the page--}}
        {{--tiles.addTo(mymap);--}}

        {{-- const api_url = 'https://www.mwpf.co.za/ecodashboardLive/public/livechart/map'; --}}


        {{--async function getCordinates () {--}}

            {{--const response = await fetch(api_url);--}}

            {{--//Turn the data from the string to JSON--}}
            {{--const data = await response.json();--}}

            {{--const longitude_data = [];--}}
            {{--const latitude_data = [];--}}

            {{--for (i = 0; i < data.length; i++) {--}}

                {{--latitude_data.push(data[i].latitude);--}}
                {{--longitude_data.push(data[i].longitude);--}}


                {{--if (latitude_data[i] != '' && longitude_data[i] != '') {--}}
                    {{--L.marker( [--}}
                        {{--parseFloat(latitude_data[i]),--}}
                        {{--parseFloat(longitude_data[i])--}}
                    {{--]).addTo(mymap);--}}

                {{--}--}}

            {{--}--}}


            {{--// const  { latitude, longitude } = data;--}}
            {{--// console.log(data);--}}


            {{--// langlong.setLatLng([latitude, longitude]);--}}

            {{--// document.getElementById('result').textContent = latitude;--}}
            {{--// document.getElementById('lon').textContent = longitude;--}}

        {{--}--}}

        {{--getCordinates();--}}


        {{--// setTimeout(getCordinates(), 5000);--}}
        {{--setInterval(getCordinates, 3000);--}}


    </script> -->

@endsection




