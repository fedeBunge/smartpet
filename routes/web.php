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

Route::get('/teste', function() {
  return view('auth.registerLaravel');
});

Route::get('/', 'HomeController@index');

Route::get('/faq', 'StaticController@indexFAQ');
Route::get('/profile', 'StaticController@indexProfile');

Route::get('/products/api', 'ProductsController@api');
Route::resource('/products', 'ProductsController');

Route::get('/listByCategory/{id}','productsController@listCategoryById'); // Lista por category_id
Route::get('/listByAnimal/{id}','productsController@listAnimalById'); // Lista por animal_id
Route::match(['get', 'post'], '/findProduct', 'productsController@findProduct')->name('product.finder');
// route::get('/findProduct', 'productsController@findProduct');
Route::get('/listDetail/{id}', 'ProductsController@show')->name('listDetail.show'); // Detalle de producto

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/carritoDeCompras', 'ProductsController@carritoDeCompras');
