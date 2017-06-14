<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('cars', 'Api\CarController', [
    'only' => ['index', 'store', 'update', 'destroy'], 'as' => 'api'
]);

Route::resource('car/owners', 'Api\CarOwnerController', [
    'only' => ['index', 'store', 'update', 'destroy'], 'as' => 'api',
]);
