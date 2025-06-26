<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StudentDashboardController;
use App\Exports\ExamTemplateExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ExamController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Registration (Only for students)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 👇 Removed generic /dashboard route

// Student Dashboard (Protected by auth & student middleware)
Route::middleware(['auth', 'student'])->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
 Route::get('/exam/start/{id}', [ExamController::class, 'start'])->name('exam.start');
    Route::post('/exam/submit', [ExamController::class, 'submit'])->name('submit_exam');
    Route::get('/results', [ExamController::class, 'results'])->name('student.results');
});

// Admin Dashboard (Protected by auth & admin middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
   
 
    Route::get('/create-exam', [AdminDashboardController::class, 'createExam'])->name('admin.create_exam');
    Route::get('/results', [AdminDashboardController::class, 'viewResults'])->name('admin.results');
    Route::get('/applications', [AdminDashboardController::class, 'viewApplications'])->name('admin.applications');
    Route::get('/students', [AdminDashboardController::class, 'manageStudents'])->name('admin.students');
 Route::post('/upload-exam', [AdminDashboardController::class, 'uploadExam'])->name('admin.upload_exam');
    Route::get('/exam/{id}/questions', [AdminDashboardController::class, 'viewExamQuestions'])->name('admin.view_exam_questions');
    Route::get('/download-template', [AdminDashboardController::class, 'downloadTemplate'])->name('admin.download_template');
Route::delete('/exam/{id}', [AdminDashboardController::class, 'deleteExam'])->name('admin.delete_exam');
Route::post('/toggle-exam-status/{id}', [AdminDashboardController::class, 'toggleExamStatus'])->name('admin.toggle_exam_status');
Route::post('/publish-results', [App\Http\Controllers\AdminDashboardController::class, 'publishResults'])->name('admin.publish.results');
Route::post('/publish-results', [ExamController::class, 'publishResults'])->name('admin.publish.results');
Route::get('/exam-results/{examId}', [ExamController::class, 'viewExamResults'])->name('admin.exam.results');
Route::get('/exam/{examId}/answersheet/{userId}', [ExamController::class, 'downloadAnswerSheet'])->name('admin.download.answersheet');
Route::delete('/users/{id}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');
Route::delete('/applications/{id}', [AdminDashboardController::class, 'destroyApplication'])->name('applications.destroy');


});
