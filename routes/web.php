<?php

use App\Http\Controllers\Registration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProfileController;
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


Route::resource("/student", StudentController::class) ->middleware('customauth');
Route::post("/login", [RegistrationController::class,'login']);
Route::resource("/dashboard", StudentController::class)->middleware('customauth');


//profile
Route::resource("/profile", ProfileController::class)->middleware('customauth');
Route::post("/createprofile", [ProfileController::class,'store'])->middleware('customauth');

Route::get("/profileUpdate", [ProfileController::class,'edit'])->middleware('customauth');
Route::post("/updateprofile", [ProfileController::class,'update'])->middleware('customauth');

Route::get("/logout", [RegistrationController::class,'logout'])->middleware('customauth');