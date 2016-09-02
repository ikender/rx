<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$distance_units = ['69' => 'miles', '60' => 'nautical miles', '111.045' => 'kilometers', '552' => 'furlongs'];
	$radii          = [10 => 10, 25 => 25, 50 => 50, 100 => 100];
	$limit          = [5 => 5, 10 => 10, 25 => 25, 50 => 50];

    return view('form', ['distance_units' => $distance_units, 'radii' => $radii, 'limit' => $limit]);
});

Route::get('/results', 'DistanceController@getLocations');
