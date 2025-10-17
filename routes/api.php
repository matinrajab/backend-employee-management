<?php

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\WorkUnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('employees', [EmployeeController::class, 'index']);
    Route::get('search-employees', [EmployeeController::class, 'search']);
    Route::post('employee', [EmployeeController::class, 'store']);
    Route::get('employee/{id}', [EmployeeController::class, 'show']);
    Route::get('work-unit/{id}', [EmployeeController::class, 'showByWorkUnit']);
    Route::put('employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('employee/{id}', [EmployeeController::class, 'destroy']);
    Route::get('employee-create', [EmployeeController::class, 'create']);
    Route::get('filter', [EmployeeController::class, 'filter']);

    Route::get('work-units', [WorkUnitController::class, 'index']);
});
