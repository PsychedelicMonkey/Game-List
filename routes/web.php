<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
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

Route::resource('game-list', GameController::class)->parameters([
    'game-list' => 'game',
])->except('show');

Route::resource('game-list', GameController::class)->parameters([
    'game-list' => 'game:slug',
])->only('show');

Route::resource('genre', GenreController::class)->parameters([
    'genre' => 'genre:slug'
])->only('show');

require __DIR__ . '/auth.php';
