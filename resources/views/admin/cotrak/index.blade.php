@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Cotrak ')

@section('title','Cotrak')

@section('breadcrumb1', 'Cotrak')

@section('breadcrumb2', 'View')

@section('headassest')
    <style>
        .modal-body {
           max-height:60vh;
           padding-bottom: 20px;
        }
    </style>
    <!-- Theme style -->
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>

@endsection
@section('content')
    <!-- Main content -->OOO
    <div class="content">

        
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
    {{-- {!! $barchart->script() !!}
    {!! $piechart->script() !!}

    {!! $chart->script() !!}
    {!! $line->script() !!}

    {!! $bardata->script() !!}
    {!! $barcode->script() !!} --}}
    
    </script>

@endsection




