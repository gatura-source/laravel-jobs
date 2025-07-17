<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', fn() => to_route('jobs.index'));
// Route::get('/job', JobController::class);
Route::resource('jobs', JobController::class)
    ->only('index', 'show');

Route::get('login', fn() => to_route('auth.create'))->name('login');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store', 'destroy']);

Route::delete('logout', fn() => to_route('auth.destroy'))
    ->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');