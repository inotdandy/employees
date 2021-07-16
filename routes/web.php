<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\CitiesController;
use App\Http\Controllers\Backend\StatesController;
use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\DepartmentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UsersController::class);
Route::put('users/{user}/change_password', [UsersController::class, 'changePassword'])->name('users.change_password');

Route::resource('/countries', CountriesController::class);

Route::resource('/states', StatesController::class);

Route::resource('/cities', CitiesController::class);

Route::resource('/departments', DepartmentsController::class);