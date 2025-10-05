<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Route::get('/', function () {
//     return view('blog.index');
// });


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimeSearchController;




Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/animelist', [BlogController::class, 'animelist'])->name('blog.animelist');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/anime/search', [AnimeSearchController::class, 'search'])->name('anime.search');
Route::get('/anime/filter', [AnimeSearchController::class, 'filterByTag'])->name('anime.filter');

