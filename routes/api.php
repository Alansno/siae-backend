<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\IsTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/nada', function (Request $request) {
    return response()->json('Unauthorized', 401);
})->name('login');

Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'authenticate');
    Route::post('auth/logout', 'logout')->middleware('auth:sanctum');
});

Route::controller(DegreeController::class)->group(function () {
    Route::post('degree/create', 'create')->middleware('auth:sanctum', isAdmin::class);
    Route::post('degree/subject-associate', 'subjectAssociate')->middleware('auth:sanctum', isAdmin::class);
});

Route::controller(GroupController::class)->group(function () {
    Route::post('group/create', 'create')->middleware('auth:sanctum', isAdmin::class);
});

Route::controller(SemesterController::class)->group(function () {
    Route::post('semester/create', 'create')->middleware('auth:sanctum', isAdmin::class);
});

Route::controller(SubjectController::class)->group(function () {
    Route::post('subject/create', 'create')->middleware('auth:sanctum', isAdmin::class);
});

Route::controller(StudentController::class)->group(function () {
    Route::post('student/create', 'create')->middleware('auth:sanctum', isAdmin::class);
});

Route::controller(TeacherController::class)->group(function () {
    Route::post('teacher/create', 'create')->middleware('auth:sanctum', isAdmin::class);
    Route::post('teacher/create-classroom', 'room')->middleware('auth:sanctum', isAdmin::class);
    Route::post('teacher/study-teacher', 'studyTeacher')->middleware('auth:sanctum', IsTeacher::class);
});