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

Route::resource('discounts', 'DiscountsController');


Route::middleware('ajax')->prefix('discounts/')->name('discounts.ajax.')->group(function() {
    Route::post('list', 'DiscountsController@list')->name('list');
    Route::delete('delete/{discount}', 'DiscountsController@destroy')->name('destroy');
    Route::post('restore/{discount}', 'DiscountsController@restore')->name('restore');
});