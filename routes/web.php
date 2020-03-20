<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api/plants' , 'namespace' => 'Plant'], function () {
    Route::get('filters','PlantController@filters');
});
Route::get('', function () {
    return view('index');
});
