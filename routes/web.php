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

Route::get('/', 'BlogController@index');
Route::get('upload','Upload@show');
Route::get('post/{slug}','BlogController@show');
Route::get('post/{baz}', 'BlogController@show1')->where('baz', '.*');  // Anything

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
