<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/upload/images/ckeditor', 'HomeController@uploadImagesCkeditor')
        ->name('upload.images.ckeditor');

    # Route Event
    Route::resource('event', 'EventController');

    # Route News
    Route::resource('news', 'NewsController');

    # Route Kategori News
    Route::resource('kategori-news', 'KategoriNewsController');
});
