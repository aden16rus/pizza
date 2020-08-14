<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('index');

Auth::routes();

Route::get('/cart', 'CartController@show')->name('cart.show');
Route::post('/cart/add', 'CartController@addItem')->name('cart.add');
Route::post('/cart/update', 'CartController@updateItem')->name('cart.update');
Route::get('/cart/remove/{id}', 'CartController@removeItem')->name('cart.remove');
Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin-panel'], 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin_index');
    Route::resource('product', 'ProductController');
});
