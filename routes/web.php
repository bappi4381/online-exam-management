<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
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
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('dashboard');
    Route::get('/student/create', [TeacherController::class, 'studentCreate'])->name('student.add');
    Route::get('/students', [TeacherController::class, 'index'])->name('students.index');
    Route::get('/students/{student}/edit', [TeacherController::class, 'edit'])->name('students.edit');
    Route::delete('/students/{student}', [TeacherController::class, 'destroy'])->name('students.destroy');
    Route::put('/students/{student}', [TeacherController::class, 'update'])->name('students.update');
    Route::post('/student/submit-student', [TeacherController::class, 'store'])->name('submit-student');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
