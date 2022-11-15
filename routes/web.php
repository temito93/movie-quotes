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
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');

//Login User
Route::post('/sessions', [SessionsController::class, 'authenticate'])->middleware('guest');

//Logout User
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Admin
Route::prefix('/admin')->group(function () {
	Route::get('/main/{locale}', [AdminController::class, 'show'])->middleware('auth')->name('dashboard');
	Route::prefix('/{locale}/{movie}')->group(function () {
		Route::delete('/delete', [MoviesController::class, 'destroy'])->middleware('auth');
		Route::get('/edit', [MoviesController::class, 'edit'])->middleware('auth')->name('movie_edit');
		Route::patch('/update', [MoviesController::class, 'update'])->middleware('auth');
	});
	Route::prefix('/{locale}')->group(function () {
		Route::get('/upload-movie', [MoviesController::class, 'index'])->middleware('auth')->name('movie_upload');
		Route::post('/movies', [MoviesController::class, 'store'])->middleware('auth');
		Route::get('/quotes', [QuotesController::class, 'index'])->middleware('auth')->name('show_quotes');
		Route::get('/upload-quotes', [QuotesController::class, 'show'])->middleware('auth')->name('quote_upload');
		Route::post('/quotes', [QuotesController::class, 'store'])->middleware('auth');
		Route::prefix('/{quote}')->group(function () {
			Route::get('/edit_quote', [QuotesController::class, 'edit'])->middleware('auth')->name('quote_edit');
			Route::patch('/update_quote', [QuotesController::class, 'update'])->middleware('auth');
			Route::delete('/delete_quote', [QuotesController::class, 'destroy'])->middleware('auth');
		});
	});
});

//Geo Locale
Route::get('/admin/ge', [LangController::class, 'ge'])->middleware('auth');

//Eng Locale
Route::get('/admin/en', [LangController::class, 'en'])->middleware('auth');

//Homepage Locale
Route::get('/home/en/{locale}', [LangController::class, 'homeEn'])->name('lang_en');
Route::get('/home/geo/{locale}', [LangController::class, 'homeGe'])->name('lang_ge');
