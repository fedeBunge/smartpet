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

Route::get('/', 'HomeController@index');

Route::get('/faq', 'StaticController@indexFAQ');
Route::get('/listByCategory/{id}','productsController@show'); // Lista por category_id
Route::get('/listByCategory/{id}/{page}','productsController@pagesCategory'); //  Lista por category_id paginado
