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


Route::group(['prefix' => 'offline'], function(){

	Route::get('/', [
		'uses' => 'OfflineController@getIndex',
		'as' => 'offline'	
	]);

	Route::post('/experiment',[
		'uses' => 'OfflineController@postImageid',
		'as' => 'expexec'
	]);

});

Route::group(['prefix' => 'online'], function(){

	Route::get('/',[
		'uses' => 'OnlineController@getIndex',
		'as' => 'online'
	]);	

	Route::post('/onexperiment',[
		'uses' => 'OnlineController@singleExperiment',
		'as' => 'onlexp'
	]);

	Route::post('/totalExp',[
		'uses' => 'OnlineController@totalExperiment',
		'as' => 'totalExp'
	]);	

	Route::post('/upload',[
		'uses' => 'OnlineController@upload',
		'as' => 'upload'
	]);	

});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/error', function () {
    return view('errors.503');
})->name('error');


Route::group(['middleware' => ['web']], function(){

});