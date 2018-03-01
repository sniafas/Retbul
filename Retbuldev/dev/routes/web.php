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
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('home');
})->name('home');



Route::group(['prefix' => 'offline'], function(){

	Route::get('/', [
		'uses' => 'OfflineController@index',
		'as' => 'offline'	
	]);

	Route::post('/experiment',[
		'uses' => 'OfflineController@postImageid',
		'as' => 'expexec'
	]);

});

Route::group(
	['middleware' => ['role:admin']],
	function () {
		Route::get('/dashboard/users', 'UsersController@index');
		Route::get('/dashboard/users/{id}', 'UsersController@edit');
		Route::patch('/dashboard/users/{id}', 'UsersController@update');
	}
);

Route::middleware('auth:api')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::prefix('api/v2')->group(function() {
    Route::resource('images', 'DatasetController@index');
});