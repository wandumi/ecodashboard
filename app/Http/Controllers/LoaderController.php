<?php

namespace App\Http\Controllers;

use App\loader;
use App\Charts\unclaimed;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

class LoaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.livechart.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\loader  $loader
     * @return \Illuminate\Http\Response
     */
    public function show(loader $loader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loader  $loader
     * @return \Illuminate\Http\Response
     */
    public function edit(loader $loader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loader  $loader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loader $loader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loader  $loader
     * @return \Illuminate\Http\Response
     */
    public function destroy(loader $loader)
    {
        //
    }



    public function map(){
        $result = loader::all();
        return response()->json($result);
        // return $result;
    }

    public function chart(){

        $currentDate = Carbon::now(+2)->subMonths(3)->startOfMonth();
        $lastUpdate = Carbon::now(+2)->subMonths(3)->endOfMonth();
        // dd($lastUpdate, $currentDate);

        // // $currentDate = date('Y-m-d H:i:s');

        $result = DB::table('analytics')->whereBetween('created_at', [$currentDate,$lastUpdate])->count();
        // $result = DB::table('analytics')->whereBetween('created_at', ["2019-01-01","2019-01-31"])->count();
        // dd($result);

        $rand = rand(0, $result);
        // dd($rand);

        return response()->json($rand);
        // return response()->json($result);
    }

    public function chartstatic(){

        $currentDate = Carbon::now(+2)->subMonths(3)->startOfDay();
        $lastUpdate = Carbon::now(+2)->subMonths(3)->endOfDay();
        // dd($lastUpdate, $currentDate);

        $result = DB::table('analytics')->whereBetween('created_at', [$currentDate,$lastUpdate])->count();

        $rand = rand(0, $result);
        // dd($rand);

        return response()->json($rand);
        // return response()->json($result);
    }

    public function charttwo(){

        $currentDate = Carbon::now(+2)->subMonths(3)->startOfDay();
        $lastUpdate = Carbon::now(+2)->subMonths(3)->endOfDay();
        // dd($lastUpdate, $currentDate);

        $result = DB::table('analytics')->whereBetween('created_at', [$currentDate,$lastUpdate])->count();
        // dd($result);

        // $rand = rand(0, $result);
        //dd($rand);

        return response()->json($rand);
        // return response()->json($result);
    }


    public function query() {
        
        $result = DB::table('analytics')->where('created_at', '>=', '2017-12-12')->get(); 

        foreach($result as $result){
            
        }

        
        dd($result);
        return $result;
    }
}
