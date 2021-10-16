<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::namespace("Auth")->name('auth.')->group(function () {
    Route::post('verify', 'RegisterController@verify')->name('verify');
});