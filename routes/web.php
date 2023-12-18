<?php

use App\Http\Controllers\Registration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('students/login');
});


Route::resource("/register", RegistrationController::class);
Route::post("/admin", [RegistrationController::class,'store']);


Route::resource("/student", StudentController::class);
Route::post("/login", [RegistrationController::class,'login']);
Route::resource("/dashboard", StudentController::class);