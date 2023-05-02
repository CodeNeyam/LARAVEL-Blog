<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Public section
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::post('/posts/{id}/comment', [PostController::class, 'storeComment'])->name('posts.storeComment');


// Admin section
Route::prefix('admin')->group(function () {
    Route::resource('posts', 'App\Http\Controllers\Admin\PostController')->names([
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
        'update' => 'admin.posts.update',
        'destroy' => 'admin.posts.destroy'
    ]);
    Route::resource('comments', 'App\Http\Controllers\Admin\CommentController')->only(['index', 'destroy'])->names([
        'index' => 'admin.comments.index',
        'destroy' => 'admin.comments.destroy'
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');





