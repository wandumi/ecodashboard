
@extends('admin.layouts.app')

@section('browsertitle', 'Ecodashboard | Analytics ')

@section('title','Analytics ')

@section('breadcrumb1', 'Analytics')

@section('breadcrumb2', 'View')

@section('headassest')
    <!-- Theme style -->
   <link rel="stylesheet" href="">
   <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <ul class="nav nav-pills ranges">
                <li><a href="#" data-range='7'>7 Days</a></li>
                <li><a href="#" data-range='30'>30 Days</a></li>
                <li><a href="#" data-range='60'>60 Days</a></li>
                <li><a href="#" data-range='90'>90 Days</a></li>
            </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
               <div id="stats-container" style="height: 250px;"></div>
            </div>
        </div>
    </div>
@endsection
@section('chartsscripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    // $(function() {
  // Create a function that will handle AJAX requests
  function requestData(days, chart){
    $.ajax({
      type: "GET",
      url: 'http://ecodashboard.test/charts/getApi', // This is the URL to the API
    //   data: { days: days }
      dataType: 'json',
      success: function(point){
          console.log(point);
      }
    });
//     .done(function( data ) {
//       // When the response to the AJAX request comes back render the chart with new data
//       console.log(data);
//       chart.setData(JSON.parse(data));
//     })
//     .fail(function() {
//       // If there is no communication between the server, show an error
//       alert( "error occured" );
//     });

}

//   var chart = Morris.Bar({
//     // ID of the element in which to draw the chart.
//     element: 'stats-container',
//     // Set initial data (ideally you would provide an array of default data)
//     data: [0,0],
//     xkey: 'date',
//     ykeys: ['value'],
//     labels: ['Users']
//   });
//   // Request initial data for the past 7 days:
//   requestData(7, chart);
//   $('ul.ranges a').click(function(e){
//     e.preventDefault();
//     // Get the number of days from the data attribute
//     var el = $(this);
//     days = el.attr('data-range');
//     // Request the data and render the chart using our handy function
//     requestData(days, chart);
//     // Make things pretty to show which button/tab the user clicked
//     el.parent().addClass('active');
//     el.parent().siblings().removeClass('active');
//   })


// });

</script>
@endsection
