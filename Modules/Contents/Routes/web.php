<?php

use Illuminate\Support\Facades\Route;

//content
Route::prefix('contents')->group(function () {
    Route::get('/', 'ContentsController@index');
});

Route::resource('contents', 'ContentsController')->except('index, create, edit');

Route::prefix('contents')->name('contents.')->group(function () {
    Route::get('index/{category_id?}', 'ContentsController@index')->name('index');
    Route::get('create/{category_id?}', 'ContentsController@create')->name('create');
    Route::get('edit/{category_id?}', 'ContentsController@edit')->name('edit');
});

Route::middleware('ajax')->group(function () {
    Route::prefix('contents/ajax')->name('contents.ajax.')->group(function () {
        Route::post('list/{category_id?}', 'ContentsController@list')->name('list');
        Route::delete('delete/{content}', 'ContentsController@destroy')->name('destroy');
        Route::post('restore', 'ContentsController@restore')->name('restore');
        Route::post('enable', 'ContentsController@enable')->name('enable');
        Route::post('disable', 'ContentsController@disable')->name('disable');
    });
});


//categories
Route::resource('contents-category', 'ContentsCategoryController')->except('index', 'create');

Route::prefix('contents-category')->name('contents-category.')->group(function () {
    Route::get('index/{parent_id?}', 'ContentsCategoryController@index')->name('index');
    Route::get('create/{parent_id?}', 'ContentsCategoryController@create')->name('create');

});

Route::middleware('ajax')->group(function () {
    Route::prefix('contents-category')->name('contents-category.ajax.')->group(function () {
        Route::post('list/{parent_id}', 'ContentsCategoryController@list')->name('list');
        Route::delete('delete/{category}', 'ContentsCategoryController@destroy')->name('destroy');
        Route::post('restore', 'ContentsCategoryController@restore')->name('restore');
        Route::post('enable', 'ContentsCategoryController@enable')->name('enable');
        Route::post('disable', 'ContentsCategoryController@disable')->name('disable');
    });
});


//tags
Route::resource('contents-tags', 'ContentsTagController');

Route::middleware('ajax')->group(function () {
    Route::prefix('contents-tags')->name('contents-tags.ajax.')->group(function () {
        Route::post('list', 'ContentsTagController@list')->name('list');
        Route::delete('delete/{tag}', 'ContentsTagController@destroy')->name('destroy');
        Route::post('restore', 'ContentsTagController@restore')->name('restore');
        Route::post('enable', 'ContentsTagController@enable')->name('enable');
        Route::post('disable', 'ContentsTagController@disable')->name('disable');
    });
});

//comment
Route::resource('contents-comment', 'CommentsController')->only('index');

Route::middleware('ajax')->group(function () {
    Route::prefix('ContentsComment')->name('contents-comment.ajax.')->group(function () {
        Route::post('list', 'CommentsController@list')->name('list');
        Route::delete('delete/{comment}', 'CommentsController@destroy')->name('destroy');
        Route::post('restore', 'CommentsController@restore')->name('restore');
        Route::post('enable', 'CommentsController@enable')->name('enable');
        Route::post('disable', 'CommentsController@disable')->name('disable');
        Route::post('show-comment', 'CommentsController@showـcomment')->name('show-comment');
    });
});
