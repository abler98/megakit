<?php

Route::get('/', 'Admin\AdminController@index')->name('admin');

Route::resource('cars', 'Admin\CarController', [
    'only' => ['index', 'create', 'edit'], 'as' => 'admin',
]);

Route::resource('car/owners', 'Admin\CarOwnerController', [
    'only' => ['index', 'create', 'edit'], 'as' => 'admin',
]);
