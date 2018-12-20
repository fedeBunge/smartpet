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

// Route::get('/teste', function() {
//   return view('auth.registerLaravel');
// });

Route::get('/', 'HomeController@index');

Route::get('/faq', 'StaticController@indexFAQ');
Route::get('/profile', 'StaticController@indexProfile')->middleware('auth');

Route::get('/products/api', 'ProductsController@api');
// Route::resource('/products', 'ProductsController');
Route::resource('/products', 'ProductsController')->except(['create', 'edit', 'show']);
Route::get('/products/create', 'ProductsController@create')->name('products.create')->middleware('auth');
Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit')->middleware('auth');
Route::get('/products/{id}', 'ProductsController@show')->name('listDetail.show'); // Detalle de producto

Route::get('/listByCategory/{id}','ProductsController@listCategoryById'); // Lista por category_id
Route::get('/listByAnimal/{id}','ProductsController@listAnimalById'); // Lista por animal_id
Route::match(['get', 'post'], '/findProduct', 'ProductsController@findProduct')->name('product.finder');
// route::get('/findProduct', 'productsController@findProduct');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/carritoDeCompras', 'ProductsController@carritoDeCompras');
