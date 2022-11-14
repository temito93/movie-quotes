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
Route::get('/home/{locale}', [MoviesController::class, 'show'])->name('homepage');

//Home Movie Page With Quotes
Route::get('/home/{locale}/movie/{id}', [MoviesController::class, 'movie']);

//Show Login Form
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');

//Login User
Route::post('/sessions', [SessionsController::class, 'authenticate'])->middleware('guest');

//Logout User
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

//Show Admin Dashboard
Route::get('/admin/main/{locale}', [AdminController::class, 'show'])->middleware('auth')->name('dashboard');

//Delete Movie
Route::delete('/admin/{locale}/{movie}/delete', [MoviesController::class, 'destroy'])->middleware('auth');

//Show Movie Edit Form
Route::get('/admin/{locale}/{movie}/edit', [MoviesController::class, 'edit'])->middleware('auth')->name('movie_edit');

//Show Upload Movie Form
Route::get('/admin/{locale}/upload-movie', [MoviesController::class, 'index'])->middleware('auth')->name('movie_upload');

//Update Movie
Route::patch('/admin/{locale}/{movie}/update', [MoviesController::class, 'update'])->middleware('auth');

//Upload Movie
Route::post('/admin/{locale}/movies', [MoviesController::class, 'store'])->middleware('auth');

//Show All Quotes
Route::get('/admin/{locale}/quotes', [QuotesController::class, 'index'])->middleware('auth')->name('show_quotes');

//Show Quotes Upload Form
Route::get('/admin/{locale}/upload-quotes', [QuotesController::class, 'show'])->middleware('auth')->name('quote_upload');

//Edit Quote Form
Route::get('/admin/{locale}/{quote}/edit_quote', [QuotesController::class, 'edit'])->middleware('auth')->name('quote_edit');

//Upload Quote
Route::post('/admin/{locale}/quotes', [QuotesController::class, 'store'])->middleware('auth');

//Update Quote
Route::patch('/admin/{locale}/{quote}/update_quote', [QuotesController::class, 'update'])->middleware('auth');

//Delete Quote
Route::delete('/admin/{locale}/{quote}/delete_quote', [QuotesController::class, 'destroy'])->middleware('auth');

//Geo Locale
Route::get('/admin/ge', [LangController::class, 'ge'])->middleware('auth');

//Eng Locale
Route::get('/admin/en', [LangController::class, 'en'])->middleware('auth');

//Homepage Locale

Route::get('/home/en/{locale}', [LangController::class, 'homeEn'])->name('lang_en');
Route::get('/home/geo/{locale}', [LangController::class, 'homeGe'])->name('lang_ge');
