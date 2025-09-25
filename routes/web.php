<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

// // redirect root ke nyxx-farm
// Route::get('/', fn() => redirect()->route('nyxx.farm'));

// Nyxx Farm utama
Route::get('/nyxx-farm', [AnimalController::class, 'index'])->name('nyxx.farm');

// Articles / News
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

// Contacts (GET form + POST store)
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::view('/about', 'about')->name('about');
