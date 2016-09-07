<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog/','Catalog@index');
Route::get('/catalog/{category}','Catalog@category');
Route::get('/kino/{cinema}','cinema@index');
Route::post('/comment/post','kinoComment@post');
Route::get('/searchresult','search@result');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

