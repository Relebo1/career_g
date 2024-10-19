<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Institution Management
        Route::get('/institutions', [AdminController::class, 'showInstitutions'])->name('admin.institutions');
        Route::post('/institutions/add', [AdminController::class, 'addInstitution'])->name('admin.institutions.add');
        Route::delete('/institutions/{id}', [AdminController::class, 'deleteInstitution'])->name('admin.institutions.delete');

        // Faculty Management
        Route::get('/faculties', [AdminController::class, 'manageFaculties'])->name('admin.faculties');
        Route::post('/faculties/add', [AdminController::class, 'addFaculty'])->name('admin.faculties.add');
        Route::delete('/faculties/{id}', [AdminController::class, 'deleteFaculty'])->name('admin.faculties.delete');

        // Course Management
        Route::get('/courses', [AdminController::class, 'manageCourses'])->name('admin.courses');
        Route::post('/courses/add', [AdminController::class, 'addCourse'])->name('admin.courses.add');
        Route::delete('/courses/{id}', [AdminController::class, 'deleteCourse'])->name('admin.courses.delete');

        // Admissions
        Route::get('/admissions', [AdminController::class, 'showAdmissions'])->name('admin.admissions');
        Route::post('/admissions/update/{id}', [AdminController::class, 'updateAdmission'])->name('admin.admissions.update');
    });
});

// Student Routes
Route::prefix('student')->group(function () {
    Route::get('/login', [StudentController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentController::class, 'login']);
    Route::get('/register', [StudentController::class, 'showRegistrationForm'])->name('student.register');
    Route::post('/register', [StudentController::class, 'register']);
    Route::middleware('auth:student')->group(function () {
        Route::get('/apply', [StudentController::class, 'showApplicationForm'])->name('student.apply');
        Route::post('/apply', [StudentController::class, 'storeApplication'])->name('student.apply.store');
        Route::get('/profile', [StudentController::class, 'editProfile'])->name('student.profile.edit');
        Route::post('/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
        Route::post('/logout', [StudentController::class, 'logout'])->name('student.logout');
        Route::get('/admissions', [StudentController::class, 'viewAdmissions'])->name('student.admissions');
    });
});

// Institution Routes
Route::prefix('institution')->group(function () {
    Route::get('/login', [InstitutionController::class, 'showLoginForm'])->name('institution.login');
    Route::post('/login', [InstitutionController::class, 'login']);
    Route::get('/register', [InstitutionController::class, 'showRegistrationForm'])->name('institution.register');
    Route::post('/register', [InstitutionController::class, 'register']);
    Route::middleware('auth:institution')->group(function () {
        Route::get('/dashboard', [InstitutionController::class, 'dashboard'])->name('institution.dashboard');
        Route::post('/logout', [InstitutionController::class, 'logout'])->name('institution.logout');
        Route::get('/courses/add', [InstitutionController::class, 'showCourseForm'])->name('institution.courses.add');
Route::post('/courses/add', [InstitutionController::class, 'storeCourse'])->name('institution.courses.add');

        // Course Management
        Route::get('/courses', [InstitutionController::class, 'showCourseForm'])->name('institution.courses');
        Route::post('/courses/add', [InstitutionController::class, 'storeCourse'])->name('institution.courses.add');
        Route::delete('/courses/{id}', [InstitutionController::class, 'deleteCourse'])->name('institution.courses.delete');

        // Faculty Management
        Route::get('/faculties', [InstitutionController::class, 'manageFaculties'])->name('institution.faculties');
        Route::get('/faculties/{id}/edit', [InstitutionController::class, 'editFaculty'])->name('institution.faculties.edit');
        Route::post('/faculties/add', [InstitutionController::class, 'storeFaculty'])->name('institution.faculties.add');
        Route::delete('/faculties/{id}', [InstitutionController::class, 'deleteFaculty'])->name('institution.faculties.delete');

        // Applications
        Route::get('/applications', [InstitutionController::class, 'viewApplications'])->name('institution.applications');
        Route::post('/admissions/update/{id}', [InstitutionController::class, 'updateApplicationStatus'])->name('institution.admissions.update');
    });
});
