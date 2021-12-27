<?php

use Illuminate\Support\Facades\Route;

Route::get('get-notifications', [
    'as' => 'admin.notification.index',
    'uses' => 'NotificationsController@index',
    'middleware' => 'can:admin.orders.index',
]);

Route::get('get-notifications/{id}/edit', [
    'as' => 'admin.notification.edit',
    'uses' => 'NotificationsController@edit',
    'middleware' => 'can:admin.pages.edit',
]);
