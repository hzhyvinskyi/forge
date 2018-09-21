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
Route::get('testing', 'HomeController@testing')->name('testing');

Route::prefix('post')->group(function () {
    Route::get('/', 'PostsController@index')->name('post.index');
    Route::get('show/{id}', 'PostsController@show')->name('post.show');
    Route::get('create', 'PostsController@create')->name('post.create');
    Route::post('store', 'PostsController@store')->name('post.store');
    Route::get('edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('update/{id}', 'PostsController@update')->name('post.update');
    Route::get('delete/{id}', 'PostsController@delete')->name('post.delete');
});

Route::prefix('form')->group(function () {
    Route::get('/', 'HomeController@showForm')->name('form');
    Route::post('test-form', 'HomeController@testingForm')->name('form.test-validation');
});

//Route::middleware('guest')->group(function () {
//    Route::get('text', function () {
//        return 'text';
//    });
//});
//
Route::get('login', function () {
    return 'login';
})->name('login');

Route::get('collection-testing', 'CollectionController@run')->name('collection-testing');

Route::get('factory', function () {
    return factory(App\Post::class, 5)->create();
});
