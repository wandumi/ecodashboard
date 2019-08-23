<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('livechart', function () {
//     // return view('admin.analytics.livechart');
//     dd(Charts::libraries());
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('{path}', 'HomeController@index')->where('path','([A-z\d-\/_.]+)?');

Route::resource('unclaimed', 'UnclaimedBenefitController');

Route::resource('users', 'ManageController');

Route::resource('analytics', 'AnalyticsController');

Route::resource('webusers', 'WebuserController');

Route::resource('partemployer', 'PartemployerController');

Route::resource('websitesa', 'WebsitesaController');

Route::resource('cotrak', 'cotrakController');

Route::resource('social', 'SocialController');

Route::get('livechart','LoaderController@index');
Route::get('livechart/chart','LoaderController@chart');
Route::get('livechart/charttwo','LoaderController@charttwo');
Route::get('livechart/map','LoaderController@map');
Route::get('livechart/query','LoaderController@query');

// socialite links for facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('facebook/callback', 'Auth\LoginController@handleProviderCallback');

//summy way of login in users
Route::get('facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    $login_link = $fb
            ->getRedirectLoginHelper()
            ->getLoginUrl('https://localhost:8000/facebook/callback', ['email', 'user_events']);
    
            echo '<a href="' . $login_link . '">Log in with Facebook</a>';
});

Route::fallback(function() {
    return 'Hm, why did you land here somehow?';
});

