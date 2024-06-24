<?php

<<<<<<< HEAD
use App\Http\Controllers\DegreeController;
=======
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
>>>>>>> cda64a9f60252c4b3c4e18fe93b95f74d6ceb590
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

<<<<<<< HEAD
Route::controller(DegreeController::class)->group(function () {
    Route::post('degree/create', 'create');
=======
Route::controller(SemesterController::class)->group(function () { 


    Route::post('semester/create','create');
});

Route::controller(GroupController::class)->group(function () {
    
    Route::post('group/create','create');
});

Route::controller(SubjectController::class)->group(function () {
    
    Route::post('subject/create','create');
>>>>>>> cda64a9f60252c4b3c4e18fe93b95f74d6ceb590
});
