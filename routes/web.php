<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Config;

//Redirect
Route::get('/', function () {
	return redirect('/home/' . Config::get('app.locale'));
});

//Home Page
Route::prefix('/home')->group(function () {
	Route::get('/{locale}', [MoviesController::class, 'show'])->name('homepage');
	Route::get('/{locale}/movie/{id}', [MoviesController::class, 'movie']);
});

//Show Login Form
Route::view('/login', 'sessions.create')->middleware('guest')->name('login');

//Login User
Route::post('/sessions', [SessionsController::class, 'authenticate'])->middleware('guest');

//Logout User
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Admin
Route::prefix('/admin')->middleware(['setLocale', 'auth'])->group(function () {
	Route::get('/main/{locale}', [AdminController::class, 'show'])->name('dashboard');
	Route::prefix('/{locale}/{movie}')->group(function () {
		Route::delete('/delete', [MoviesController::class, 'destroy']);
		Route::get('/edit', [MoviesController::class, 'edit'])->name('movie_edit');
		Route::patch('/update', [MoviesController::class, 'update']);
	});
	Route::prefix('/{locale}')->group(function () {
		Route::get('/upload-movie', [MoviesController::class, 'index'])->name('movie_upload');
		Route::post('/movies', [MoviesController::class, 'store']);
		Route::get('/quotes', [QuotesController::class, 'index'])->name('show_quotes');
		Route::get('/upload-quotes', [QuotesController::class, 'show'])->name('quote_upload');
		Route::post('/quotes', [QuotesController::class, 'store']);
		Route::prefix('/{quote}')->group(function () {
			Route::get('/edit_quote', [QuotesController::class, 'edit'])->name('quote_edit');
			Route::patch('/update_quote', [QuotesController::class, 'update']);
			Route::delete('/delete_quote', [QuotesController::class, 'destroy']);
		});
	});
});
