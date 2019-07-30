<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/live', function(Request $request){
    return $request->user();
})->middleware('auth:api');

Route::get('/data', function(){

        $data = collect([]); // Could also be an array

        // for ($days_backwards = 31; $days_backwards >= 0; $days_backwards--) {
        //     // Could also be an array_push if using an array rather than a collection.
        //     $data->push(analytics::whereDate('created_at', today()->subDays($days_backwards) )->first()->count() );

        //     //another
        //     // $data->push(analytics::whereBetween('created_at', today()->subDays($days_backwards) )->count() );

        // }

        $data->push(analytics::whereDate('created_at', today()->subDays($days_backwards) )->first()->count() );

        dd($datas);

        return $data;


});

