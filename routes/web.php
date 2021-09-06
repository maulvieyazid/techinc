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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/about-us', 'WelcomeController@about')->name('about');
Route::get('/news', 'WelcomeController@news')->name('all.news');
Route::get('/news/{news}', 'WelcomeController@detailNews')->name('detail.news');
Route::get('/galeri/{slug_kategori}', 'WelcomeController@detailGaleri')->name('detail.galeri');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::post('/upload/images/ckeditor', 'HomeController@uploadImagesCkeditor')
            ->name('upload.images.ckeditor');

        # Route Event
        Route::resource('event', 'EventController');

        # Route News
        Route::resource('news', 'NewsController');

        # Route Kategori News
        Route::resource('kategori-news', 'KategoriNewsController');

        # Route Startup
        Route::resource('startup', 'StartupController');

        # Route Tim Startup
        Route::resource('tim-startup', 'TimStartupController');

        # Route Member
        Route::resource('member', 'MemberController');

        # Route Jenis Member
        Route::resource('jenis-member', 'JenisMemberController');

        # Route Role Member
        Route::resource('role-member', 'RoleMemberController')->only([
            'index', 'create', 'store'
        ]);
        Route::delete('role-member/{id_member}/{id_jenis}', 'RoleMemberController@destroy')
            ->name('role-member.destroy');

        # Route Kategori (Galeri)
        Route::resource('kategori', 'KategoriController');

        # Route Galeri
        Route::resource('galeri', 'GaleriController');

        # Route Carousel Image
        Route::resource('carousel-image', 'CarouselImageController');

        # Route Partner
        Route::resource('partner', 'PartnerController');
    });
});
