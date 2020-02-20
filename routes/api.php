<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
	Route::post('login','loginController');
    Route::post('logout', 'logoutController');
    Route::post('register','RegisterController');
    Route::get('me','MeController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:api'], function () {
    Route::resource('','AdminController')->only(['index', 'update']);
    Route::resource('users','UserController');
});

Route::group(['prefix' => 'users' , 'middleware' => 'auth:api'], function () {
    Route::get('{user}','UserController@show');
    Route::patch('{user}','UserController@update');
});

Route::group(['prefix' => 'plants' , 'namespace' => 'Plant'], function () {
    Route::get('','PlantController@index');
    Route::post('','PlantController@store');
    Route::get('{plant}','PlantController@show');
    Route::patch('{plant}','PlantController@update');
    Route::delete('{plant}','PlantController@destroy');
});



