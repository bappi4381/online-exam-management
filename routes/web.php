<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\ExamController;
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

Route::get('student/login', [StudentLoginController::class, 'login'])->name('student.login');
Route::post('student/login', [StudentLoginController::class, 'loginCheck'])->name('student.login.submit');

Route::middleware('student')->group(function () {
    Route::get('student/logout', [StudentLoginController::class, 'logout'])->name('student.logout');
    Route::get('student/exam', [ExamController::class,'exam'])->name('student.exam');
    Route::get('student/dashboard', function () {
        return view('student.dashboard');
    });
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
    Route::get('/subject', [TeacherController::class, 'subject'])->name('subject.index');
    Route::post('/subject-add', [TeacherController::class, 'createSubject'])->name('subject.store');
    Route::get('/subject/topic', [TeacherController::class, 'subject'])->name('subject.index');
    Route::get('/subject/question', [TeacherController::class, 'question'])->name('subject.question');
    Route::post('/subject/question/store', [TeacherController::class, 'createQuestion'])->name('question.store');
    Route::get('/subject/question/show', [TeacherController::class, 'manageQuestion'])->name('question.manage');
    Route::get('/search', [TeacherController::class, 'search'])->name('question.search');
    Route::get('/generate-pdf', [TeacherController::class, 'generatePDF'])->name('generate.pdf');
});

require __DIR__.'/auth.php';
