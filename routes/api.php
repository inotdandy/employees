<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeesController;
use App\Http\Controllers\Api\EmployeesDataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/countries', [EmployeesDataController::class, 'getCountries']);
Route::get('/employees/{country}/states', [EmployeesDataController::class, 'getStates']);
Route::get('/employees/{state}/cities', [EmployeesDataController::class, 'getCities']);
Route::get('/employees/departments', [EmployeesDataController::class, 'getDepartments']);

Route::get('/employees', [EmployeesController::class, 'index']);
Route::post('/employee', [EmployeesController::class, 'store']);
Route::delete('/employee/{employee}', [EmployeesController::class, 'destroy']);
Route::get('/employee/{employee}', [EmployeesController::class, 'edit']);
Route::put('/employee/{employee}', [EmployeesController::class, 'update']);