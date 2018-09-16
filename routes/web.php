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

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

Route::namespace('Gallery')->prefix('gallery')->group(function () {
    Route::get('/', 'GalleryController@index')->name('gallery.index');
    Route::get('show/{id}', 'GalleryController@show')->name('gallery.show');
    Route::get('create', 'GalleryController@create')->name('gallery.create');
    Route::post('store', 'GalleryController@store')->name('gallery.store');
    Route::get('edit/{id}', 'GalleryController@edit')->name('gallery.edit');
    Route::post('update/{id}', 'GalleryController@update')->name('gallery.update');
    Route::get('delete/{id}', 'GalleryController@delete')->name('gallery.delete');
});

Route::prefix('form')->group(function () {
    Route::get('/', 'HomeController@showForm')->name('form');
    Route::post('test-form', 'HomeController@testingForm')->name('form.test-validation');
});
