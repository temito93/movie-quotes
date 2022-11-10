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

Route::get('/', function () {
	return view('welcome');
});

//Show Login Form
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');

//Login User
Route::post('/sessions', [SessionsController::class, 'authenticate'])->middleware('guest');

//Logout User
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
