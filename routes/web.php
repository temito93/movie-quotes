<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home Page
Route::get('/', [MoviesController::class, 'show']);

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
Route::get('/admin/{locale}/{movie}/edit', [MoviesController::class, 'edit'])->middleware('auth');

//Show Upload Movie Form
Route::get('/admin/{locale}/upload-movie', [MoviesController::class, 'index'])->middleware('auth');

//Update Movie
Route::patch('/admin/{locale}/{movie}/update', [MoviesController::class, 'update'])->middleware('auth');

//Upload Movie
Route::post('/admin/{locale}/movies', [MoviesController::class, 'store'])->middleware('auth');

//Show All Quotes
Route::get('/admin/{locale}/quotes', [QuotesController::class, 'index'])->middleware('auth');

//Show Quotes Upload Form
Route::get('/admin/{locale}/upload-quotes', [QuotesController::class, 'show'])->middleware('auth');

//Edit Quote Form
Route::get('/admin/{locale}/{quote}/edit_quote', [QuotesController::class, 'edit'])->middleware('auth');

//Upload Quote
Route::post('/admin/{locale}/quotes', [QuotesController::class, 'store'])->middleware('auth');

//Update Quote
Route::patch('/admin/{locale}/{quote}/update_quote', [QuotesController::class, 'update'])->middleware('auth');

//Delete Quote
Route::delete('/admin/{locale}/{quote}/delete_quote', [QuotesController::class, 'destroy'])->middleware('auth');

//Geo Locale
Route::get('/admin/ge', [LangController::class, 'ge'])->middleware('auth');

//Eng Locale
Route::get('/admin/en', [LangController::class, 'ge'])->middleware('auth');
