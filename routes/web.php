<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [ArticleController::class, 'index'])
   ->name('articles.index');

Route::get('/articles/{article}', [ArticleController::class, 'show'])
   ->name('articles.show');

Route::get('/category/{category}', [CategoryController::class, 'byCategory'])
   ->name('categories.byCategory');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


Route::middleware('auth')->prefix('admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])
        ->name('index');
    
    Route::get('/articles/create', [AdminController::class, 'create'])
        ->name('articles.create');
    
    Route::post('articles', ArticleController::class)
        ->except(['arcticles','store']);

    Route::get('/articles/{article}/edit', [AdminController::class, 'edit'])
        ->name('articles.edit');

    Route::put('/articles/{article}', [AdminController::class, 'update'])
        ->name('articles.update');

    Route::delete('/articles/{article}', [AdminController::class, 'destroy'])
        ->name('articles.destroy');
});
