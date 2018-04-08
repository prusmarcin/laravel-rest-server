<?php

$namespace = 'Restserver\Http\Controllers';

Route::group([
	'middleware' => 'api',
    'namespace' => $namespace,
	'prefix' => 'api',
], function(){
	
	Route::get('/items/available', 'ItemsController@available');
	Route::get('/items/available/{amount}', 'ItemsController@availableCondition');
	Route::get('/items/unavailable', 'ItemsController@unavailable');
	Route::resource('/items', 'ItemsController', ['except' => ['create']]);
});

	




