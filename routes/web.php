<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;

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
    return view('departments.index');
});

Route::get('/departments/create',[DepartmentsController::class,'create'])->name('departments.create');
Route::get('/departments',[DepartmentsController::class,'index'])->name('departments.index');
Route::get('/departments/{id}',[DepartmentsController::class,'show'])->name('departments.show');