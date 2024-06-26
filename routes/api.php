<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'authenticate');
    Route::post('auth/logout', 'logout')->middleware('auth:sanctum');
});

Route::controller(DegreeController::class)->group(function () {
    Route::post('degree/create', 'create');
    Route::post('degree/subject-associate', 'subjectAssociate');
});

Route::controller(GroupController::class)->group(function () {
    Route::post('group/create', 'create');
});

Route::controller(SemesterController::class)->group(function () {
    Route::post('semester/create', 'create');
});

Route::controller(SubjectController::class)->group(function () {
    Route::post('subject/create', 'create');
});

Route::controller(StudentController::class)->group(function () {
    Route::post('student/create', 'create');
});