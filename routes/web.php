<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;



// Public start page for guests | Display jobs
Route::get('/', function () {
    $jobs = Job::latest()->take(6)->get();
    return view('start', compact('jobs'));
})->name('start');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Protected routes for logged-in users only
Route::middleware(['auth','verified'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('jobs', JobController::class);
});

require __DIR__.'/auth.php';
