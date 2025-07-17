<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationsController;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn () => to_route('jobs.index'));
// Route::get('/job', JobController::class);
Route::resource('jobs', JobController::class)
    ->only('index', 'show');

Route::get('login', fn () => to_route('auth.create'))->name('login');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store', 'destroy']);

Route::delete('logout', fn () => to_route('auth.destroy'))
    ->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');
// Route::resource('applications', JobApplicationsController::class)
//     ->only(['create', 'store']);
Route::middleware(['auth'])->group(function () {
    Route::resource('jobs.applications', JobApplicationsController::class)
    ->only('create','store');
});