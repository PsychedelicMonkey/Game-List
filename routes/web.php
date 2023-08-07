<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('login', [LoginController::class, 'create'])
            ->middleware('guest')
            ->name('login');

Route::post('login', [LoginController::class, 'store'])
            ->middleware('guest');

Route::post('logout', LogoutController::class)
            ->middleware('auth')
            ->name('logout');

Route::get('register', [RegisterController::class, 'create'])
            ->middleware('guest')
            ->name('register');

Route::post('register', [RegisterController::class, 'store'])
            ->middleware('guest');
