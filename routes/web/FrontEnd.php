<?php

use Illuminate\Support\Facades\Route;

/* **** **** **** Home Route **** **** **** */
Route::namespace('FrontEnd')->group(function () {
    Route::get('/', 'HomeController@index')->name('home-page');
});
/* **** **** **** Event Route **** **** **** */
Route::namespace('FrontEnd')->group(function () {
    Route::resource('events', 'EventsController')->only(['index', 'show']);
});
/* **** **** **** AboutUs Route **** **** **** */
Route::namespace('FrontEnd')->group(function () {
    Route::resource('aboutUs', 'AboutUsController')->only(['index']);
});
/* **** **** **** ContactUs Route **** **** **** */
Route::namespace('FrontEnd')->group(function () {
    Route::resource('contactUs', 'ContactUsController')->only(['index', 'show']);
});
/* **** **** **** Blog Route **** **** **** */
Route::namespace('FrontEnd')->group(function () {
    Route::resource('blog', 'BlogController')->only(['index', 'show']);
});
/* **** **** **** Gallery Route **** **** **** */
Route::namespace('FrontEnd')->group(function () {
    Route::resource('gallery', 'GalleryController')->only(['index', 'show']);
});




