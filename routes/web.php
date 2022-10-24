<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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
    return view('webPage');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    Route::get('/category/create',  'create');
    Route::post('/category/create',  'store')->name('category.store');
    Route::get('/category/edit/{id}', 'edit');
    Route::put('/category/edit/{id}', 'update')->name('category.update');
    Route::delete('/category/destroy/{id}', 'destroy')->name('category.destroy');
});

Route::controller(PostsController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/', 'home');
    Route::get('/search/{id}', 'searchCategory')->name('home.search');
    Route::post('/search', 'searchTitle')->name('home.searchTitle');
    Route::get('/posts/create', 'create');
    Route::post('/posts/create', 'store')->name('posts.store');
    Route::get('/posts/edit/{id}', 'edit');
    Route::put('/posts/edit/{id}', 'update')->name('posts.update');
    Route::delete('/posts/destroy/{id}', 'destroy')->name('posts.destroy');
    Route::get('/posts/detail/{id}', 'show')->name('posts.show');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/home',  'index');
    Route::get('/author', 'author');
    Route::get('/users/{id}', 'edit');
    Route::put('/users/{id}', 'update')->name('user.update');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/posts/detail', 'store')->name('comment.store');
    Route::get('/comment', 'index');
});

Route::get('send-mail', [MailController::class, 'index']);

require __DIR__ . '/auth.php';
