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

use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController;

Route::get('/admin/login', [RegisterController::class, 'index'])->name('admin.login');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/js/lang.js', [HomeController::class, 'exportJs'])->name('admin.lang');

Auth::routes();
Route::get('/user/login', [RegisterController::class, 'index'])->name('admin.login');
Route::get('/', 'Client\HomeController@index')->name('client.home');
Route::get('/category/{cate}', 'Client\HomeController@getCategory')->name('client.getcategory');
Route::get('/manga/{slug}', 'Client\HomeController@getManga')->name('client.getmanga');
Route::get('/manga/{manga}/{chapter}', 'Client\HomeController@getChapter')->name('client.getChapter');

Route::post('/client/login/{provider}', 'Client\AuthController@loginProvider')->name('client.login');
Route::get('/client/logout', 'Client\AuthController@logout')->name('client.logout');

Route::post('/manga/comment', 'Client\HomeController@comment')->name('client.comment');
Route::get('/follow/{id}', 'Client\HomeController@follow')->name('client.follow');
Route::get('/follow', 'Client\HomeController@listFollow')->name('client.listfollow');

Route::post('/search', 'Client\HomeController@searchFullText')->name('search');
Route::get('/language/{lang}', 'Client\HomeController@switchLanguage')->name('client.language');
Route::get('/profile', 'Client\ProfileController@profile')->name('client.profile');
Route::get('/manga_follow', 'Client\ProfileController@mangaFollow')->name('client.profile.follow');
Route::post('/profile', 'Client\ProfileController@saveProfile')->name('client.profile.save');
