<?php
/**
 * Created by PhpStorm.
 * User: phanngocthien
 * Date: 5/20/19
 * Time: 09:59
 */

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', [HomeController::class, 'index'])->name('admin.home');
Route::middleware('auth')->group(function(){

    Route::middleware('can:manage-user')->group(function(){
        Route::get('/user', 'UserController@index');
        Route::get('/user/getlist', 'UserController@getList');
        Route::get('/user/status/{id}', 'UserController@updateStatus');
        Route::get('/user/delete/{id}', 'UserController@delete');
        Route::post('/user/store', 'UserController@store');
        Route::post('/user/update', 'UserController@update');
        Route::get('/user/{id}/edit', 'UserController@edit');
    });
    Route::get('/profile', 'UserController@profile')->name('admin.profile');;
    Route::post('/user/profile', 'UserController@updateProfile');
    Route::post('/password', 'UserController@updatePassword');

    Route::middleware('can:manage-category')->group(function(){
        Route::get('/category', 'CategoryController@index')->name('category.index');
        Route::get('/category/getlist', 'CategoryController@getlist')->name('category.getlist');
        Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
        Route::post('/category/store', 'CategoryController@store')->name('category.store');
        Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
        Route::post('/category/update', 'CategoryController@update')->name('category.update');
    });

    Route::middleware('can:manage-manga')->group(function(){
        Route::get('/manga', 'MangaController@index')->name('manga.index');
        Route::get('/manga/getlist', 'MangaController@getlist')->name('manga.getlist');
        Route::post('/manga/store', 'MangaController@store')->name('manga.store');
        Route::get('/manga/delete/{id}', 'MangaController@delete')->name('manga.delete');
        Route::get('/manga/status/{id}', 'MangaController@updateStatus')->name('manga.status');
        Route::get('/manga/{id}/edit', 'MangaController@edit')->name('manga.edit');
        Route::post('/manga/update', 'MangaController@update')->name('manga.update');

        Route::get('/manga/{id}', 'ChapterController@index')->name('manga.index');
        Route::get('/chapter/getlist/{id}', 'ChapterController@getlist')->name('chapter.getlist');
        Route::post('/chapter/store', 'ChapterController@store')->name('chapter.store');
        Route::get('/chapter/delete/{id}', 'ChapterController@delete')->name('chapter.delete');
        Route::get('/chapter/status/{id}', 'ChapterController@updateStatus')->name('chapter.status');
        Route::get('/chapter/{id}/edit', 'ChapterController@edit')->name('chapter.edit');
        Route::post('/chapter/update', 'ChapterController@update')->name('chapter.update');
    });
    
    Route::middleware('can:manage-role')->group(function(){    
        Route::get('/role', 'RoleController@index')->name('role.index');
        Route::get('/role/getlist', 'RoleController@getlist')->name('role.getlist');
        Route::post('/role/permission', 'RoleController@addpermisson')->name('role.addpermisson');
        Route::get('/role/permission/{role_id}/{permission_id}', 'RoleController@deletePermission')->name('role.deletePermisson');
        Route::post('/role/store', 'RoleController@store')->name('role.store');
        Route::get('/role/delete/{id}', 'RoleController@delete')->name('role.delete');
    });

    Route::get('/reports', [ReportController::class, 'index'])->name('admin.report.index');
    Route::get('/reports/all', [ReportController::class, 'dataTable'])->name('admin.report.gets');
    Route::middleware('can:manage-role')->group(function(){
        Route::get('/database', 'DatabaseController@index')->name('data.index');
        Route::get('/database/getlist', 'DatabaseController@getlist')->name('data.getlist');
        Route::get('/backup/{id}', 'DatabaseController@backup')->name('data.backup');
    });
});
