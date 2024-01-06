<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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


Route::get('/student/all', [StudentController::class, 'getStudents']);
Route::get('/student/{id}', [StudentController::class, 'getStudbyID']);
Route::post('/student/add', [StudentController::class, 'addStud']);
Route::put('/student/update/{id}', [StudentController::class, 'updateStud']);
Route::delete('/student/delete/{id}', [StudentController::class, 'deleteStud']);