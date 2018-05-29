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
Route::get('/showrestaurant', 'RestaurantController@showRestaurant');

//passing data to controlle and perform data insert
Route::get('/createorder/{regno}/{regstate}/{custname}/{custphone}/{vehbrand}/{vehmodel}/{vehyear}/{serialno}', 'OrderController@createOrder');
//show all data in table
Route::get('/showallorders', 'OrderController@showAllOrders');

//3_1
Route::get('/insertrestaurant/{restname}/{restphone}/{restaddress1}/{restaddress2}/{suburb}/{state}/{numberofseats}', 'RestaurantController@insertRestaurant');
Route::get('/showallrestaurants', 'RestaurantController@showAllRestaurants');
Route::get('/deleterestaurant/{restid}', 'RestaurantController@deleteRestaurant');
Route::get('/updaterestaurant/{restid}/{restname}/{restphone}/{restaddress1}/{restaddress2}/{suburb}/{state}/{numberofseats}', 'RestaurantController@updateRestaurant');

//4_1
Route::get('/restaurantwithdetails/{id}', 'RestaurantController@restaurantwithdetails');
Route::resource('categories', 'CategoriesController');
Route::resource('comments', 'CommentsController');
Route::resource('countries', 'CountriesController');
Route::resource('posts', 'PostsController');
Route::resource('restaurants', 'RestaurantController');
Route::resource('roles', 'RolesController');
Route::resource('roles_user', 'Roles_UserController');
Route::resource('users', 'UsersController');
