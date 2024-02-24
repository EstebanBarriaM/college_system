<?php

use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CourseStudentController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;

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
Auth::routes([
    'register' => false
]);

Route::middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::post('add-students/{id}', [CourseController::class, 'saveStudents'])->name('courses.save_students');
    Route::get('list-students/{id}', [CourseController::class, 'listStudents'])->name('courses.list_students');
    Route::resource('subjets', SubjectController::class);

});


