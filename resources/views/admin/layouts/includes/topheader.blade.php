<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>
     @yield('browsertitle')
  </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
  {{-- <script src="http://code.highcharts.com/maps/highmaps.js"></script> --}}

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

  <style>
        #mine {
            height: 400px;
        }

        /* .nav-filter {
            background-color:#444 !important;
        } */

        .nav-pills > li > a:hover {
            background-color: #FF6699 !importapills
        }

        .nav-pills > li > a:active
        .nav-pills > li > a:focus  {
            background-color: green !important;
        }

        /* .nav-pills .open > a,
        .nav-pills .open > a:active,
        .nav-pills .open > a:focus{
            background-color: #FF6699 !important;
        } */

    </style>
  {{-- {!! Charts::assets() !!} --}}
  @yield('headassest')

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
{{-- @yield('body') --}}
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div id="app">
