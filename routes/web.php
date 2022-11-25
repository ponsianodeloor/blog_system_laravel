<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\admin\TagController as AdminTagController;
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

Route::controller(PostController::class)->group(function (){
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('category.show');
});

Route::controller(TagController::class)->group(function (){
    Route::get('/tag/{tag}', 'show')->name('tag.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    /*Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');*/

    Route::get('system', function (){
        return view('system.index');
    })->name('system');

    Route::controller(AdminCategoryController::class)->group(function (){
        Route::get('/system/admin/categories', 'index')->name('system.admin.categories.index');
        Route::get('/system/admin/categories/{category}', 'edit')->name('system.admin.categories.edit');

        Route::post('/system/admin/categories', 'store')->name('system.admin.category.store');
        Route::put('/system/admin/categories/update/{category}', 'update')->name('system.admin.categories.update');
        Route::delete('/system/admin/categories/destroy/{category}', 'destroy')->name('system.admin.categories.destroy');
    });
    Route::controller(AdminTagController::class)->group(function (){
        Route::get('/system/admin/tags', 'index')->name('system.admin.tags.index');
        Route::get('/system/admin/tags/{tag}', 'edit')->name('system.admin.tags.edit');

        Route::post('/system/admin/tags', 'store')->name('system.admin.tag.store');
        Route::put('/system/admin/tags/update/{tag}', 'update')->name('system.admin.tags.update');
        Route::delete('/system/admin/tags/destroy/{tag}', 'destroy')->name('system.admin.tags.destroy');
    });

});
