<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlShortenerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/shorten-url/create', [UrlShortenerController::class, 'create'])->name('shorten.create');
    Route::post('/shorten-url', [UrlShortenerController::class, 'store'])->name('shorten.store');    
    Route::get('/shorturl/{shortUrl}', [UrlShortenerController::class, 'redirect'])->name('shorten.redirect');
    Route::get('/statistics', [UrlShortenerController::class, 'statistics'])->name('shorten.statistics');

    Route::get('/shorten-url/{id}/edit', [UrlShortenerController::class, 'edit'])->name('shorten.edit');
    Route::put('/shorten-url/{id}', [UrlShortenerController::class, 'update'])->name('shorten.update');
    Route::delete('/shorten-url/delete/{id}', [UrlShortenerController::class, 'destroy'])->name('shorten.destroy');
});


require __DIR__.'/auth.php';

