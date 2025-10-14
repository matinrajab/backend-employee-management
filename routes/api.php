<?php

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('employees', [EmployeeController::class, 'index']);
Route::post('employee', [EmployeeController::class, 'store']);
Route::put('employee/{id}', [EmployeeController::class, 'update']);
