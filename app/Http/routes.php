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

Route::group(['domain' => 'doujinreleas.es'], function () {
	Route::get('/', function () {
		return view('welcome');
	});

});

Route::group(['domain' => '{event}.doujinreleas.es'], function () {
	Route::get('/', 'EventController@index');
	Route::get('/{id}', 'EventController@specific');
});

Route::group(['prefix' => 'api/v1'], function () {
	Route::resource('comiket', 'Api\ComiketController');
	Route::get('comiket/{id}/releases', 'Api\ComiketController@releases');

	Route::resource('vocamas', 'Api\VocamasController');
	Route::get('vocamas/{id}/releases', 'Api\VocamasController@releases');

	Route::resource('releases', 'Api\ReleaseController');
	Route::get('releases/{id}/comiket', 'Api\ReleaseController@comiket');
	Route::get('releases/{id}/vocamas', 'Api\ReleaseController@vocamas');
});

Route::resource('user', 'UserController');
