<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ImageController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;



// Public start page for guests | Display jobs
Route::get('/', function () {
    $jobs = Job::latest()->take(6)->get();
    $nextJobs = Job::latest()->skip(6)->take(6)->get();
    return view('start', compact('jobs', 'nextJobs'));
})->name('start');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Protected routes for logged-in users only
Route::middleware(['auth','verified'])->group(function () {
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('jobs', JobController::class);
    Route::resource('images', ImageController::class);
});

require __DIR__.'/auth.php';
