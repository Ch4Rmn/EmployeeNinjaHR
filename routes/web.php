<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GithubController;


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



Auth::routes(
    // ['register' => false]
);
// github
Route::get('login/github', [GithubController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [GithubController::class, 'handleGithubCallback']);
//
Route::middleware(['auth'])->group(function () {
    // login
    Route::get('/', [PageController::class, 'index'])->name('home');
    // Employee
    Route::resource('/employee', EmployeeController::class);
    Route::get('/employee/datatable/ssd', [EmployeeController::class, 'ssd'])->name('ssd');
});
