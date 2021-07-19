<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/textaction', [App\Http\Controllers\TextAction::class, 'index']);
Route::get('/viewaction', [App\Http\Controllers\ViewAction::class, 'index']);
Route::get('/jsonaction', [App\Http\Controllers\JsonAction::class, 'index']);
Route::get('/jsonpaction', [App\Http\Controllers\JsonpAction::class, 'index']);
Route::get('/downloadaction', [App\Http\Controllers\DownloadAction::class, 'index']);
Route::get('/redirectaction', [App\Http\Controllers\RedirectAction::class, 'index']);
Route::get('/streamaction', [App\Http\Controllers\StreamAction::class, 'index']);
Route::get('/payload', [App\Http\Controllers\ArticlePayloadAction::class, 'index']);
