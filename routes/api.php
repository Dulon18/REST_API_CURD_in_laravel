<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('students/list', [StudentController::class,'index']);
Route::post('students/store', [StudentController::class,'store']);
Route::put('students/update/{id}', [StudentController::class,'update']);
Route::get('students/show/{id}', [StudentController::class,'show']);
Route::delete('students/destroy/{id}', [StudentController::class,'destroy']);




