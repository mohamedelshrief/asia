<?php

use Illuminate\Support\Facades\Route;

Route::get('get-notifications', [
    'as' => 'admin.notification.index',
    'uses' => 'NotificationController@index',
    'middleware' => 'can:admin.orders.index',
]);

Route::get('get-notifications/{id}/edit', [
    'as' => 'admin.notification.edit',
    'uses' => 'NotificationController@edit',
    'middleware' => 'can:admin.pages.edit',
]);


Route::get('add-notifications/', [
    'as' => 'admin.notification.create',
    'uses' => 'NotificationController@create'
]);
