<?php

namespace App\Http\Controllers;

use App\websitesa;
use Illuminate\Http\Request;
use App\Charts\unclaimed;
use Charts;
use Carbon\Carbon;
Use DB;

class WebsitesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //This is the range data from 2017 to 2019
        $Seventeen = DB::table('analytics')->whereBetween('created_at', ['2017-01-01', '2017-12-31'])->count();
        $Eighteen  = DB::table('analytics')->whereBetween('created_at', ['2018-01-01', '2018-12-31'])->count();
        $Nighteen  = DB::table('analytics')->whereBetween('created_at', ['2019-01-01', '2019-12-31'])->count();
        $Twenty    = DB::table('analytics')->whereBetween('created_at', ['2020-01-01', '2020-12-31'])->count();

        $barchart = new unclaimed;
        $barchart->labels(['2017','2018','2019','2020']);
        $barchart->dataset('Visitors', 'bar', [$Seventeen,$Eighteen,$Nighteen,$Twenty] )
        ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);


        $piechart = new unclaimed;
        $piechart->labels(['2017','2018','2019','2020']);
        $piechart->minimalist(true);
        $piechart->displayLegend(true);
        $piechart->dataset('Visitors', 'pie', [$Seventeen,$Eighteen,$Nighteen,$Twenty])
        ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);

        //This is the pagenation structure
        //$analytics = websitesa::paginate(5);
        $analytics = DB::table('analytics')->orderBy('created_at', 'desc')->paginate(5);


        //counting sql codes
        $Total = DB::table('analytics')->where('created_at', '>', '2017-01-01')->get();
        $clientIP = websitesa::distinct()->get(['clientIP']);


        //Weekly calculations from the database

        // $begin = carbon::now()->subYear(2)->startOfYear();
        // $end   = carbon::now()->subYear(2)->endOfYear();

        //This is the best code
        $begin = carbon::now()->startOfMonth();
        $end   = carbon::now()->endOfMonth();




        $currentMonth = websitesa::whereBetween('created_at', [$begin,$end] )
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val){
                return carbon::parse($val->created_at)->format('d');
            });

        // dd($begin, $end, $currentMonth);
        $day = [];
        $number = [];

        foreach($currentMonth as $key => $value){
            $key = str_replace('"', '', $key);
            $key = "$key";

            array_push($day, $key );
            array_push($number, count($value) );

        }

        // return $number;
        // dd($day, $number);

        $chart = new unclaimed;

        $chart->labels( $day )

            ->dataset('Daily Visitors Bar', 'bar', $number)
            ->color('white')
            ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'
            ]);



        $chart->dataset('Daily Visitors Line', 'line', $number)
            ->color('black')
            ->fill(false)
            ->backgroundColor(['##8a8a5c','009900','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'
            ]);

        // This is the line chart and it uses the same variables on top of the weekly ones


        $startDay = carbon::now()->subMonth(4)->startOfWeek();
        $endOfDay = carbon::now()->subMonth(4)->endOfWeek();
        // dd($startWeek, $endOfWeek);

        $weekly = websitesa::whereBetween('created_at', [$startDay,$endOfDay] )
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val){
                return carbon::parse($val->created_at)->format('D');
            });

    //    dd($weekly);
        $daysInWeek = [];
        $TotalInWeek = [];

        foreach($weekly as $key => $value){
            $key = str_replace('"', '',$key);
            $key = "$key";

            array_push($daysInWeek, $key );
            array_push($TotalInWeek, count($value) );
        }

        // dd($daysInWeek, $TotalInWeek);

        $line = new unclaimed;
        $line->labels($daysInWeek);
        $line->dataset('Daily Visits Line', 'bar', $TotalInWeek)
            ->color('green')
            ->backgroundColor('blue')
            //  ->lineTension()
            ->fill(true);


        // Endof the weekly
        // Start of the pie chart 219
        $January_nine    = DB::table('analytics')->whereBetween('created_at', ['2019-01-01', '2019-01-31'])->count();
        $February_nine   = DB::table('analytics')->whereBetween('created_at', ['2019-02-01', '2019-02-31'])->count();
        $March_nine      = DB::table('analytics')->whereBetween('created_at', ['2019-03-01', '2019-03-31'])->count();
        $April_nine      = DB::table('analytics')->whereBetween('created_at', ['2019-04-01', '2019-04-31'])->count();
        $May_nine        = DB::table('analytics')->whereBetween('created_at', ['2019-05-01', '2019-05-31'])->count();
        $June_nine       = DB::table('analytics')->whereBetween('created_at', ['2019-06-01', '2019-06-31'])->count();
        $July_nine       = DB::table('analytics')->whereBetween('created_at', ['2019-07-01', '2019-07-31'])->count();
        $August_nine     = DB::table('analytics')->whereBetween('created_at', ['2019-08-01', '2019-08-31'])->count();
        $September_nine  = DB::table('analytics')->whereBetween('created_at', ['2019-09-01', '2019-09-31'])->count();
        $October_nine    = DB::table('analytics')->whereBetween('created_at', ['2019-10-01', '2019-10-31'])->count();
        $November_nine   = DB::table('analytics')->whereBetween('created_at', ['2019-11-01', '2019-11-31'])->count();
        $December_nine   = DB::table('analytics')->whereBetween('created_at', ['2019-12-01', '2019-12-31'])->count();

        // 2018
        $January_eight   = DB::table('analytics')->whereBetween('created_at', ['2018-01-01', '2018-01-31'])->count();
        $February_eight  = DB::table('analytics')->whereBetween('created_at', ['2018-02-01', '2018-02-31'])->count();
        $March_eight     = DB::table('analytics')->whereBetween('created_at', ['2018-03-01', '2018-03-31'])->count();
        $April_eight     = DB::table('analytics')->whereBetween('created_at', ['2018-04-01', '2018-04-31'])->count();
        $May_eight       = DB::table('analytics')->whereBetween('created_at', ['2018-05-01', '2018-05-31'])->count();
        $June_eight      = DB::table('analytics')->whereBetween('created_at', ['2018-06-01', '2018-06-31'])->count();
        $July_eight      = DB::table('analytics')->whereBetween('created_at', ['2018-07-01', '2018-07-31'])->count();
        $August_eight    = DB::table('analytics')->whereBetween('created_at', ['2018-08-01', '2018-08-31'])->count();
        $September_eight = DB::table('analytics')->whereBetween('created_at', ['2018-09-01', '2018-09-31'])->count();
        $October_eight   = DB::table('analytics')->whereBetween('created_at', ['2018-10-01', '2018-10-31'])->count();
        $November_eight  = DB::table('analytics')->whereBetween('created_at', ['2018-11-01', '2018-11-31'])->count();
        $December_eight  = DB::table('analytics')->whereBetween('created_at', ['2018-12-01', '2018-12-31'])->count();

        // 2017
        $January_seven   = DB::table('analytics')->whereBetween('created_at', ['2017-01-01', '2017-01-31'])->count();
        $February_seven  = DB::table('analytics')->whereBetween('created_at', ['2017-02-01', '2017-02-31'])->count();
        $March_seven     = DB::table('analytics')->whereBetween('created_at', ['2017-03-01', '2017-03-31'])->count();
        $April_seven     = DB::table('analytics')->whereBetween('created_at', ['2017-04-01', '2017-04-31'])->count();
        $May_seven       = DB::table('analytics')->whereBetween('created_at', ['2017-05-01', '2017-05-31'])->count();
        $June_seven      = DB::table('analytics')->whereBetween('created_at', ['2017-06-01', '2017-06-31'])->count();
        $July_seven      = DB::table('analytics')->whereBetween('created_at', ['2017-07-01', '2017-07-31'])->count();
        $August_seven    = DB::table('analytics')->whereBetween('created_at', ['2017-08-01', '2017-08-31'])->count();
        $September_seven = DB::table('analytics')->whereBetween('created_at', ['2017-09-01', '2017-09-31'])->count();
        $October_seven   = DB::table('analytics')->whereBetween('created_at', ['2017-10-01', '2017-10-31'])->count();
        $November_seven  = DB::table('analytics')->whereBetween('created_at', ['2017-11-01', '2017-11-31'])->count();
        $December_seven  = DB::table('analytics')->whereBetween('created_at', ['2017-12-01', '2017-12-31'])->count();



        $bardata = new unclaimed;
        $bardata->labels( ['January','February','March','April','May','June','July','August',
            'September','October','November','December'] );
        $bardata->dataset('Monthly Data', 'doughnat',
            [
                $January_nine,$February_nine,$March_nine,$April_nine,$May_nine,$June_nine,
                $July_nine, $August_nine, $September_nine,$October_nine, $November_nine, $December_nine
            ])
            ->color('white')
            ->backgroundColor([
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'

            ]);

        // Start of the monthly reporting
        $barcode = new unclaimed;
        $barcode->labels(['January','February','March','April','May','June','July','August','September','October','November','December']);
        $barcode->dataset('2017 Visitors', 'bar', [
            $January_seven,$February_seven,$March_seven,$April_seven,$May_seven,$June_seven,
            $July_seven,$August_seven,$September_seven,$October_seven,$November_seven,$December_seven
        ])
            //  ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);
            ->backgroundColor('#16A085');


        $barcode->dataset('2018 Visitors', 'bar', [
            $January_eight,$February_eight,$March_eight,$April_eight,$May_eight,$June_eight,
            $July_eight,$August_eight,$September_eight,$October_eight,$November_eight,$December_eight
        ])
            //  ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);
            ->backgroundColor('#009900');

        $barcode->dataset('2019 Visitors', 'bar', [
            $January_nine,$February_nine,$March_nine,$April_nine,$May_nine,$June_nine,
            $July_nine,$August_nine,$September_nine,$October_nine,$November_nine,$December_nine
        ])
            //  ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);
            ->backgroundColor('#f1c40f');



        $today = carbon::now(2);
        // $today = carbon::today()->setTimezone('Africa/cairo');
        // return $today;
        $startDay = carbon::now()->startOfDay();
        $endOfDay = carbon::now()->endOfDay();
        //dd($startWeek, $endOfWeek);

        $Today = websitesa::whereBetween('created_at', [$startDay,$endOfDay] )->get();

        //modal chart for live
        $startMonth = carbon::now(2)->startOfMonth();
        $endMonth = carbon::now(2)->endOfMonth();


        $month = websitesa::whereBetween('created_at',[$startMonth,$endMonth])->get();





        return view('admin.websitesa.index',
            compact(
                'analytics','barchart','piechart','clientIP','Total',
                'chart','line','bardata','barcode', 'Today', 'month'

            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $startWeek = carbon::now()->subMonth(3)->startOfWeek();
        $endOfWeek = carbon::now()->subMonth(3)->endOfWeek();
        // dd($startWeek, $endOfWeek);

        $weekly = websitesa::whereBetween('created_at', [$startWeek,$endOfWeek] )
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val){
                return carbon::parse($val->created_at)->format('D');
            });

        $days = [];
        $totalNumber = [];

        foreach($weekly as $key => $value){
            $key = str_replace('"', '',$key);
            $key = "$key";

            array_push($days, $key );
            array_push($totalNumber, count($value) );
        }

        // dd($daysInWeek, $TotalInWeek);



        $chart = new unclaimed;
        $chart->labels( $days );
        $chart->dataset('Daily Visitors Bar', 'bar', $totalNumber )
            ->color('white')
            ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'
            ]);

        $chart->dataset('Daily Visitors Line', 'line', $totalNumber )->color('black')
            ->fill(false)
            ->backgroundColor(['##8a8a5c','009900','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'
            ]);

        //This is the line chart and it uses the same variables on top of the weekly ones
        $startWeek = carbon::now()->subMonth(3)->startOfWeek();
        $endOfWeek = carbon::now()->subMonth(3)->endOfWeek();
        // dd($startWeek, $endOfWeek);

        $weekly = websitesa::whereBetween('created_at', [$startWeek,$endOfWeek] )
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($val){
                return carbon::parse($val->created_at)->format('D');
            });

        $daysInWeek = [];
        $TotalInWeek = [];

        foreach($weekly as $key => $value){
            $key = str_replace('"', '',$key);
            $key = "$key";

            array_push($daysInWeek, $key );
            array_push($TotalInWeek, count($value) );
        }

        // dd($daysInWeek, $TotalInWeek);

        $line = new unclaimed;
        $line->labels($daysInWeek);
        $line->dataset('Daily Visits Line', 'line', $TotalInWeek)
            ->color('green')
            ->backgroundColor('blue')
            //  ->lineTension()
            ->fill(false);


        // Endof the weekly
        // Start of the pie chart 219
        $January_nine    = DB::table('analytics')->whereBetween('created_at', ['2019-01-01', '2019-01-31'])->count();
        $February_nine   = DB::table('analytics')->whereBetween('created_at', ['2019-02-01', '2019-02-31'])->count();
        $March_nine      = DB::table('analytics')->whereBetween('created_at', ['2019-03-01', '2019-03-31'])->count();
        $April_nine      = DB::table('analytics')->whereBetween('created_at', ['2019-04-01', '2019-04-31'])->count();
        $May_nine        = DB::table('analytics')->whereBetween('created_at', ['2019-05-01', '2019-05-31'])->count();
        $June_nine       = DB::table('analytics')->whereBetween('created_at', ['2019-06-01', '2019-06-31'])->count();
        $July_nine       = DB::table('analytics')->whereBetween('created_at', ['2019-07-01', '2019-07-31'])->count();
        $August_nine     = DB::table('analytics')->whereBetween('created_at', ['2019-08-01', '2019-08-31'])->count();
        $September_nine  = DB::table('analytics')->whereBetween('created_at', ['2019-09-01', '2019-09-31'])->count();
        $October_nine    = DB::table('analytics')->whereBetween('created_at', ['2019-10-01', '2019-10-31'])->count();
        $November_nine   = DB::table('analytics')->whereBetween('created_at', ['2019-11-01', '2019-11-31'])->count();
        $December_nine   = DB::table('analytics')->whereBetween('created_at', ['2019-12-01', '2019-12-31'])->count();

        // 2018
        $January_eight   = DB::table('analytics')->whereBetween('created_at', ['2018-01-01', '2018-01-31'])->count();
        $February_eight  = DB::table('analytics')->whereBetween('created_at', ['2018-02-01', '2018-02-31'])->count();
        $March_eight     = DB::table('analytics')->whereBetween('created_at', ['2018-03-01', '2018-03-31'])->count();
        $April_eight     = DB::table('analytics')->whereBetween('created_at', ['2018-04-01', '2018-04-31'])->count();
        $May_eight       = DB::table('analytics')->whereBetween('created_at', ['2018-05-01', '2018-05-31'])->count();
        $June_eight      = DB::table('analytics')->whereBetween('created_at', ['2018-06-01', '2018-06-31'])->count();
        $July_eight      = DB::table('analytics')->whereBetween('created_at', ['2018-07-01', '2018-07-31'])->count();
        $August_eight    = DB::table('analytics')->whereBetween('created_at', ['2018-08-01', '2018-08-31'])->count();
        $September_eight = DB::table('analytics')->whereBetween('created_at', ['2018-09-01', '2018-09-31'])->count();
        $October_eight   = DB::table('analytics')->whereBetween('created_at', ['2018-10-01', '2018-10-31'])->count();
        $November_eight  = DB::table('analytics')->whereBetween('created_at', ['2018-11-01', '2018-11-31'])->count();
        $December_eight  = DB::table('analytics')->whereBetween('created_at', ['2018-12-01', '2018-12-31'])->count();

        // 2017
        $January_seven   = DB::table('analytics')->whereBetween('created_at', ['2017-01-01', '2017-01-31'])->count();
        $February_seven  = DB::table('analytics')->whereBetween('created_at', ['2017-02-01', '2017-02-31'])->count();
        $March_seven     = DB::table('analytics')->whereBetween('created_at', ['2017-03-01', '2017-03-31'])->count();
        $April_seven     = DB::table('analytics')->whereBetween('created_at', ['2017-04-01', '2017-04-31'])->count();
        $May_seven       = DB::table('analytics')->whereBetween('created_at', ['2017-05-01', '2017-05-31'])->count();
        $June_seven      = DB::table('analytics')->whereBetween('created_at', ['2017-06-01', '2017-06-31'])->count();
        $July_seven      = DB::table('analytics')->whereBetween('created_at', ['2017-07-01', '2017-07-31'])->count();
        $August_seven    = DB::table('analytics')->whereBetween('created_at', ['2017-08-01', '2017-08-31'])->count();
        $September_seven = DB::table('analytics')->whereBetween('created_at', ['2017-09-01', '2017-09-31'])->count();
        $October_seven   = DB::table('analytics')->whereBetween('created_at', ['2017-10-01', '2017-10-31'])->count();
        $November_seven  = DB::table('analytics')->whereBetween('created_at', ['2017-11-01', '2017-11-31'])->count();
        $December_seven  = DB::table('analytics')->whereBetween('created_at', ['2017-12-01', '2017-12-31'])->count();

        $barchart = new unclaimed;
        $barchart->labels( ['January','February','March','April','May','June'] );
        $barchart->dataset('Monthly Data', 'doughnut', [$January_nine,$February_nine,$March_nine,$April_nine,$May_nine,$June_nine])
            ->color('white')
            ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);

        // Start of the monthly reporting
        $barcode = new unclaimed;
        $barcode->labels(['January','February','March','April','May','June','July','August','September','October','November','December']);
        $barcode->dataset('2018 Visitors', 'bar', [
            $January_eight,$February_eight,$March_eight,$April_eight,$May_eight,$June_eight,
            $July_eight,$August_eight,$September_eight,$October_eight,$November_eight,$December_eight
        ])
            //  ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);
            ->backgroundColor('#009900');

        $barcode->dataset('2019 Visitors', 'bar', [
            $January_nine,$February_nine,$March_nine,$April_nine,$May_nine,$June_nine,
            $July_nine,$August_nine,$September_nine,$October_nine,$November_nine,$December_nine
        ])
            //  ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);
            ->backgroundColor('#f1c40f');

        $barcode->dataset('2017 Visitors', 'bar', [
            $January_seven,$February_seven,$March_seven,$April_seven,$May_seven,$June_seven,
            $July_seven,$August_seven,$September_seven,$October_seven,$November_seven,$December_seven
        ])
            //  ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);
            ->backgroundColor('#16A085');




        // dd($month);



        //pass it to the view
        return view('admin.websitesa.create', compact('chart','line','barchart','barcode') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\websitesa  $websitesa
     * @return \Illuminate\Http\Response
     */
    public function show(websitesa $websitesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\websitesa  $websitesa
     * @return \Illuminate\Http\Response
     */
    public function edit(websitesa $websitesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\websitesa  $websitesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, websitesa $websitesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\websitesa  $websitesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(websitesa $websitesa)
    {
        //
    }

}
