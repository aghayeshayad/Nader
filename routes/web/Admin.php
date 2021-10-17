<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:' . config('roles.admin')])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    // Route::namespace('Categories')->group(function () {
    //     Route::resource('categories', 'CategoryController');

    //     Route::name('subcategories.')->group(function() {
    //         Route::get('subcategories/{category}', 'SubcategoryController@show')->name('show');
    //         Route::get('subcategories/create/{category}', 'SubcategoryController@create')->name('create');
    //         Route::post('subcategories/{id}', 'SubcategoryController@store')->name('store');
    //         Route::get('subcategories/{category}/edit', 'SubcategoryController@edit')->name('edit');
    //         Route::put('subcategories/{category}', 'SubcategoryController@update')->name('update');
    //     });
    // });

    Route::namespace('Evocatives')->group(function() {
        Route::resource('evocatives', 'EvocativeController');
    });

    Route::namespace('Settings')->group(function() {
        Route::resource('settings', 'SettingController');
    });
});

Route::middleware(['auth', 'role:' . config('roles.admin'), 'ajax'])->group(function () {
    Route::namespace('Categories')->prefix('categories')->group(function () {
        Route::name('categories.ajax.')->group(function () {
            Route::post('list', 'CategoryController@list')->name('list');
            Route::delete('destroy/{category}', 'CategoryController@destroy')->name('destroy');
        });

        Route::name('subcategories.ajax.')->group(function() {
            Route::post('list/{category}', 'SubcategoryController@list')->name('list');
        });
    });

    Route::namespace('Evocatives')->prefix('evocatives')->name('evocatives.ajax.')->group(function() {
        Route::post('list', 'EvocativeController@list')->name('list');
        Route::delete('destroy/{evocative}', 'EvocativeController@destroy')->name('destroy');
    });
});
