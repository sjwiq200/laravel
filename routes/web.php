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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'LoginController@loginCheck');

Route::post('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');


Route::prefix('product')->group(function() {

    Route::get('/listProduct', 'ProductController@listProduct');
    Route::get('/addProduct', function () {
        return view('product/addProduct');
    });
    Route::post('/addProduct', 'ProductController@addProduct');
});