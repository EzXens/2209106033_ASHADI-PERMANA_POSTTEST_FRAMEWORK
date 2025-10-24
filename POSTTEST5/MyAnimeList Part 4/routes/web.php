<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAnimeController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\AdminSourceController;
use App\Http\Controllers\Admin\AdminTrailerController;

// Route::get('/', function () {
//     return view('blog.index');
// });


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimeSearchController;




Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/animelist', [BlogController::class, 'animelist'])->name('blog.animelist');
Route::get('/blog/about', [BlogController::class, 'about'])->name('blog.about');
Route::get('/blog/contact', [BlogController::class, 'contact'])->name('blog.contact');
Route::get('/blog/{id}', [BlogController::class, 'show'])->whereNumber('id')->name('blog.show');
Route::get('/anime/search', [AnimeSearchController::class, 'search'])->name('anime.search');
Route::get('/anime/filter', [AnimeSearchController::class, 'filterByTag'])->name('anime.filter');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.show');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.perform');

    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::resource('animes', AdminAnimeController::class)->except('show');
        Route::resource('tags', AdminTagController::class)->except('show');
        Route::resource('sources', AdminSourceController::class)->except('show');
        Route::resource('trailers', AdminTrailerController::class)->except('show');
    });
});

