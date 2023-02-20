<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['prefix' => 'users'], function () {
    Route::get('/{id}', [UserController::class, 'profile'])->name('profile');
    Route::get('/', [UserController::class, 'index'])->name('users');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
});
Route::group(['prefix' => 'categories'], function () {

    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});

Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::post('/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/view/{id}', [PostController::class, 'view'])->name('posts.view');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');
});


