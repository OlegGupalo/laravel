<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['namespace'=>'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});
Route::group(['namespace'=>'Post', 'prefix' => 'posts'], function () {
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::group(['namespace'=>'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', 'StoreController')->name('post.comment.store');
    });
});

Route::group(['namespace'=>'Personal', 'prefix'=>'personal', 'middleware'=>['auth','verified']], function() {
    Route::group(['namespace'=>'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace'=>'Like', 'prefix'=>'likes'], function() {
        Route::get('/', 'IndexController')->name('personal.like.index');
        Route::delete('/{post}', 'DeleteController')->name('personal.like.delete');
    });
    Route::group(['namespace'=>'Comment', 'prefix'=>'comments'], function() {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
});

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware'=>['auth', 'admin']], function() {
    Route::group(['namespace'=>'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main');
    });
    Route::group(['namespace'=>'Post', 'prefix'=>'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('post.create');
        Route::post('/', 'StoreController')->name('post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController')->name('post.edit');
        Route::patch('/{post}', 'UpdateController')->name('post.update');
        Route::delete('/{post}', 'DeleteController')->name('post.delete');
    });
    Route::group(['namespace'=>'Category', 'prefix'=>'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('category.create');
        Route::post('/', 'StoreController')->name('category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('category.edit');
        Route::patch('/{category}', 'UpdateController')->name('category.update');
        Route::delete('/{category}', 'DeleteController')->name('category.delete');
    });
    Route::group(['namespace'=>'Tag', 'prefix'=>'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('tag.create');
        Route::post('/', 'StoreController')->name('tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController')->name('tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('tag.update');
        Route::delete('/{tag}', 'DeleteController')->name('tag.delete');
    });
    Route::group(['namespace'=>'User', 'prefix'=>'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('user.create');
        Route::post('/', 'StoreController')->name('user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('user.edit');
        Route::patch('/{user}', 'UpdateController')->name('user.update');
        Route::delete('/{user}', 'DeleteController')->name('user.delete');
    });
});
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
