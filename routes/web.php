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

use App\Http\Controllers\RestaurantLogController;

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'logs', 'middleware' => 'auth'], function () {
    Route::get('index', 'RestaurantLogController@index')->name('logs.index');
    Route::get('create', 'RestaurantLogController@create')->name('logs.create');
    Route::post('store', 'RestaurantLogController@store')->name('logs.store');
    Route::get('show/{id}', 'RestaurantLogController@show')->name('logs.show');
    Route::get('edit/{id}', 'RestaurantLogController@edit')->name('logs.edit');
    Route::post('update/{id}', 'RestaurantLogController@update')->name('logs.update');
    Route::post('destroy/{id}', 'RestaurantLogController@destroy')->name('logs.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list', function () {
    return view('list');
});
