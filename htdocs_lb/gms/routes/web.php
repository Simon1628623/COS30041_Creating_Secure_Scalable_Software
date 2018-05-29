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

Route::get('/', function () {
    return view('welcome');
});

Route::get('orderwithdetails/{id}','OrderController@orderwithdetails');
Route::resource('orders', 'OrderController');
Route::resource('orderdetails', 'OrderDetailController');

//week 6
Route::get('orders/createorderdetailswithorderid/{id}', 'OrderController@orderwithdetailswithcreate');
Route::post('orders/createorderdetailswithorderid', 'OrderController@createorderdetailswithorderid');
