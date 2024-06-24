<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(SemesterController::class)->group(function () { 


    Route::post('semester/create','create');
});

Route::controller(GroupController::class)->group(function () {
    
    Route::post('group/create','create');
});

Route::controller(SubjectController::class)->group(function () {
    
    Route::post('subject/create','create');
});
