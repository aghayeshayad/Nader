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

Route::resource('categories', 'CategoriesController');

Route::prefix('subcategories')->name('subcategories.')->group(function () {
    Route::get('/{id}', 'SubcategoriesController@show')->name('show');
    Route::get('/create/{id}', 'SubcategoriesController@create')->name('create');
});

Route::middleware(['auth', 'ajax'])->group(function () {
    Route::name('categories.ajax.')->prefix('categories')->group(function () {
        Route::post('list', 'CategoriesController@list')->name('list');
        Route::post('restore/{category}', 'CategoriesController@restore')->name('restore');
        Route::delete('destroy/{category}', 'CategoriesController@destroy')->name('destroy');
    });

    Route::prefix('subcategories')->name('subcategories.ajax.')->group(function () {
        Route::post('list/{id}', 'SubcategoriesController@list')->name('list');
    });
});
