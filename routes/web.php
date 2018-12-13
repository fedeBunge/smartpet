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

Route::get('/products/api', 'ProductsController@api');
Route::resource('/products', 'ProductsController');

Route::get('/listByCategory/{id}','productsController@listCategoryById'); // Lista por category_id
Route::get('/listByAnimal/{id}','productsController@listAnimalById'); // Lista por animal_id
Route::match(['get', 'post'], '/findProduct', 'productsController@findProduct')->name('product.finder');
// route::get('/findProduct', 'productsController@findProduct');
