<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');

Route::get('/sales-analytics', [
    'as' => 'admin.sales_analytics.index',
    'uses' => 'SalesAnalyticsController@index',
    'middleware' => 'can:admin.orders.index',
]);


Route::get('test', [
    'as' => 'admin.notification.test',
    'uses' => 'SalesAnalyticsController@test'
]);
//02878ece-72b8-11ec-85ca-e234e563d17f
