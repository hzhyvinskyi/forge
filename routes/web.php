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

Route::get('/', 'HomeController@index');
Route::get('about', 'HomeController@about');

Route::get('gallery', 'GalleryController@index');
Route::get('gallery/show/{id}', 'GalleryController@show');
Route::get('gallery/create', 'GalleryController@create');
Route::post('gallery/store', 'GalleryController@store');
Route::get('gallery/edit/{id}', 'GalleryController@edit');
Route::post('gallery/update/{id}', 'GalleryController@update');
Route::get('gallery/delete/{id}', 'GalleryController@delete');
