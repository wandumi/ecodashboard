<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\analytics;
use App\Charts\unclaimed;
// use App\Charts\livecharts;
use Charts;
use Carbon\Carbon;
Use DB;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $barchart->dataset('Visitors', 'bar', [$Seventeen,$Eighteen,$Nighteen,$Twenty])
                 ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);


        $piechart = new unclaimed;
        $piechart->labels(['2017','2018','2019','2020']);
        $piechart->dataset('Visitors', 'pie', [$Seventeen,$Eighteen,$Nighteen,$Twenty])
                 ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9']);

        $analytics = analytics::paginate(10);

        //counting sql codes
        $Total = DB::table('analytics')->where('created_at', '>', '2017-01-01')->get();
        $clientIP = analytics::distinct()->get(['clientIP']);


        //Weekly calculations from the database

        // $begin = carbon::now()->subYear(2)->startOfYear();
        // $end   = carbon::now()->subYear(2)->endOfYear();

        //This is the best code
        $begin = carbon::now()->subMonth(2)->startOfMonth();
        $end   = carbon::now()->subMonth(2)->endOfMonth();


        $currentMonth = analytics::whereBetween('created_at', [$begin,$end] )
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


        $startWeek = carbon::now()->subMonth(3)->startOfWeek();
        $endOfWeek = carbon::now()->subMonth(3)->endOfWeek();
        // dd($startWeek, $endOfWeek);

        $weekly = analytics::whereBetween('created_at', [$startWeek,$endOfWeek] )
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



        $bardata = new unclaimed;
        $bardata->labels( ['January','February','March','April','May','June','July','August',
                            'September','October','November','December'] );
        $bardata->dataset('Monthly Data', 'pie',
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

        $today = carbon::now(2);
        // $today = carbon::today()->setTimezone('Africa/cairo');
        // return $today;


        return view('admin.analytics.index',
               compact(
                   'analytics','barchart','piechart','clientIP','Total',
                   'chart','line','bardata','barcode'

            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //Weekly calculations from the database
        $today_users      = analytics::whereDate('created_at', '=', Carbon::today() )->count();
        $yesterday_users  = analytics::whereDate('created_at', '=', Carbon::today()->subDays(3) )->count();
        $day_2            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(4) )->count();
        $day_3            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(5) )->count();
        $day_4            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(6) )->count();
        $day_5            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(7) )->count();
        $day_6            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(8) )->count();

        $day_7            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(9) )->count();
        $day_8            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(10) )->count();
        $day_9            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(11) )->count();
        $day_10           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(12) )->count();
        $day_11           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(13) )->count();

        $day_12           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(14) )->count();
        $day_13           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(15) )->count();
        $day_14           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(16) )->count();
        $day_15           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(18) )->count();
        $day_16           = analytics::whereDate('created_at', '=', Carbon::today()->subDays(19) )->count();

        $day_17            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(20) )->count();
        $day_18            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(21) )->count();
        $day_19            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(22) )->count();
        $day_20            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(23) )->count();
        $day_21            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(24) )->count();
        $day_22            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(25) )->count();
        $day_23            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(26) )->count();
        $day_24            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(27) )->count();
        $day_25            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(28) )->count();
        $day_26            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(29) )->count();

        $day_27            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(30) )->count();
        $day_28            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(31) )->count();
        $day_29            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(32) )->count();
        $day_30            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(33) )->count();

        $day_31            = analytics::whereDate('created_at', '=', Carbon::today()->subDays(34) )->count();

        $twentySixteen     = analytics::whereDate('created_at', '=', carbon::today()->toDateString())->count();
        // dd($day_31);

        $chart = new unclaimed;
        $chart->labels(['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16',
                        '17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']);
        $chart->dataset('Daily Visitors Bar', 'bar', [
                    $day_31, $day_30, $day_29, $day_28, $day_27, $day_26, $day_25, $day_24, $day_23,
                    $day_22, $day_21, $day_20, $day_19, $day_18, $day_17, $day_16, $day_15,
                    $day_14, $day_13, $day_12, $day_11, $day_10, $day_9, $day_8, $day_7,
                    $day_6, $day_5, $day_4, $day_3, $yesterday_users, $twentySixteen
              ])->color('white')
              ->backgroundColor(['#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'
                                ]);

        $chart->dataset('Daily Visitors Line', 'line', [
                $day_31, $day_30, $day_29, $day_28, $day_27, $day_26, $day_25, $day_24, $day_23,
                $day_22, $day_21, $day_20, $day_19, $day_18, $day_17, $day_16, $day_15,
                $day_14, $day_13, $day_12, $day_11, $day_10, $day_9, $day_8, $day_7,
                $day_6, $day_5, $day_4, $day_3, $yesterday_users, $twentySixteen
            ])->color('black')
            ->fill(false)
            ->backgroundColor(['##8a8a5c','009900','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9',
                                 '#009900','#8a8a5c','#f1c40f','#e67e22','#16a085','#2980b9'
                                ]);

        //This is the line chart and it uses the same variables on top of the weekly ones

        $line = new unclaimed;
        $line->labels(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday']);
        $line->dataset('Daily Visits Line', 'line', [$day_6, $day_5, $day_4, $day_3, $day_2, $yesterday_users, $today_users])
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
        $barchart->dataset('Monthly Data', 'pie', [$January_nine,$February_nine,$March_nine,$April_nine,$May_nine,$June_nine])
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
        return view('admin.analytics.create', compact('chart','line','barchart','barcode') );

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
     * @param  \App\analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function show(analytics $analytics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function edit(analytics $analytics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, analytics $analytics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\analytics  $analytics
     * @return \Illuminate\Http\Response
     */
    public function destroy(analytics $analytics)
    {
        //
    }

    
}
