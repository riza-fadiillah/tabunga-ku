<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SavingsController;
use App\Http\Middleware\CheckRole;
// use App\Http\Controllers\TeacherController;
// use App\Http\Middleware\StudentOnly;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/{id}/pdf', [ProfileController::class, 'generatePDF'])->name('profile.pdf');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    


// Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::resource('siswa', SiswaController::class);
    Route::resource('majors', MajorsController::class); 
    Route::resource('classes', ClassesController::class);
    Route::resource('user', UserController::class);
    Route::resource('savings', SavingsController::class);
// });

// Route::middleware(['auth', 'checkRole:student'])->group(function () {
//     Route::get('/student-dashboard', [DashboardController::class, 'index']);
//     Route::get('/savings', [SavingsController::class, 'index'])->name('student.savings.index');
// });



// Route::middleware(['auth', 'role:student'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
//     Route::get('savings', [SavingsController::class, 'index'])->name('savings.index');
// });



// Auth Routes
require __DIR__.'/auth.php';
