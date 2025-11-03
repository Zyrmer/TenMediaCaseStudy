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
    $jobs = Job::latest()->paginate(6);
    return view('start', compact('jobs'));
})->name('start');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
});
Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');


// Protected routes for logged-in users only
Route::middleware(['auth','verified'])->group(function () {
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('categories', CategoryController::class);
    // Route::resource('jobs', JobController::class);
    Route::resource('images', ImageController::class);
});

require __DIR__.'/auth.php';
