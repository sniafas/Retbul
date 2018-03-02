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

Route::get('/download', function () {
    return view('download');
})->name('download');

Route::get('/download/{file}', 'DownloadsController@download');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/elastic', function () {
	//var_dump(new Elasticsearch\ClientBuilder);
	
	$hosts = [
	    '192.168.1.1:9200',         // IP + Port
	    'retbul.sniafas.eu:9200', // Domain + Port
	    'https://retbul.sniafas.eu:9200'  // SSL to IP + Port
	];

	//$client = Elasticsearch\ClientBuilder::create()->build();
	$client = Elasticsearch\ClientBuilder::create()           // Instantiate a new ClientBuilder
                    ->setHosts($hosts)      // Set the hosts
                    ->build();  
	
	$results = $client->search([
		"index"=>"offline",
		"type"=>"experiment",
		"body"=>[
			"query"=>[
				"match"=>[
					"building"=>"10"
				]
			]
		]

	]);

	var_dump($results);
	
	//var_dump($client);
	
})->name('elastic');

Route::get('/error', function () {
    return view('errors.503');
})->name('error');


Route::group(['middleware' => ['web']], function(){

});