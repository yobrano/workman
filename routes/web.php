<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Google Social Login */
Route::get('/login/google', [App\Http\Controllers\GoogleLoginController::class,'redirect'])->name('login.google-redirect');
Route::get('/login/google/callback',  [App\Http\Controllers\GoogleLoginController::class,'callback'])->name('login.google-callback');


Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
