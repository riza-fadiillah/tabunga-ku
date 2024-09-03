<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SavingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('siswa',SiswaController::class);
Route::resource('majors', MajorsController::class);
Route::resource('classes', ClassesController::class);
Route::resource('user', UserController::class);
Route::resource('savings',SavingsController::class);


require __DIR__.'/auth.php';
