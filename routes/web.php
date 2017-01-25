<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Hotel;
use Illuminate\Support\Facades\Input;

Route::get('auth/facebook', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleProviderCallback');

Route::resource('pages','PageController');
Route::resource('rates','RateController');
Route::get('/','PageController@index');
Route::get('/ajax-hotel',function(){
  $city_id = Input::get('city_id');
  $hotels = Hotel::where('city_id','=',$city_id)->get();
  return Response::json($hotels);
});
Route::post('/hotel',['uses' => 'PageController@hotelshow', 'as' => 'hotel.show']);
Route::get('/{city_name}/{hotel}',['uses' => 'PageController@hotelselect', 'as' => 'hotel.select']);
Route::get('/hotel',['uses' => 'PageCOntroller@hotelindex', 'as' => 'hotels.index']);

Auth::routes();

Route::get('/home', 'HomeController@index');
