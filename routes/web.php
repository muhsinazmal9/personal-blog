<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileInfoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

Route::get('/', HomeController::class)->name('index');
Route::view('/about', 'about')->name('about');

Route::group(['middleware' => ['auth', 'verified'] , 'prefix' => 'admin'], function () {
    /**
     * Dashboard
     */
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    /**
     * Category and tags (except show)
     */
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('tags', TagController::class)->except('show');

    /**
     * Solid resourses
     */
    Route::resources([
        'articles' => ArticleController::class
    ]);

    /**
     * About information
     */
    Route::get('/profile/about', [ProfileInfoController::class, 'edit'])->name('about.edit');
    Route::match(['put', 'patch'], '/profile/about', [ProfileInfoController::class, 'update'])->name('about.update');

    /**
     * Profile stuffs (came up with breeze)
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
