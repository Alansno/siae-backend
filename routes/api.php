<?php

use App\Http\Controllers\DegreeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(DegreeController::class)->group(function () {
    Route::post('degree/create', 'create');
});
