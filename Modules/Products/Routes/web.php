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

use Illuminate\Support\Facades\Route;

Route::resource('products', 'ProductsController');


Route::middleware(['ajax'])->name('products.ajax.')->group(function() {
    Route::post('get-subcategories', 'ProductsController@getSubcategories')->name('get-subcategories');
    Route::post('get-sub-subcategories', 'ProductsController@getSubSubcategories')->name('get-sub-subcategories');

    Route::post('list', 'ProductsController@list')->name('list');
    Route::delete('destroy/{product}', 'ProductsController@destroy')->name('destroy');
    Route::post('restore/{product}', 'ProductsController@restore')->name('restore');
});