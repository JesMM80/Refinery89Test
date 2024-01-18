<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\UsersController;

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


Route::get('/', [DepartmentsController::class, 'index']);

Route::get('/departments',[DepartmentsController::class,'index'])->name('departments.index');
Route::get('/departments/create',[DepartmentsController::class,'create'])->name('departments.create');
Route::get('/departments/hierarchy',[DepartmentsController::class,'hierarchy'])->name('departments.hierarchy');
Route::post('/departments',[DepartmentsController::class,'store'])->name('departments.store');
Route::get('/departments/{id}',[DepartmentsController::class,'show'])->name('departments.show');
Route::put('/departments/{department}',[DepartmentsController::class,'update'])->name('departments.update');
Route::delete('/departments/{id}',[DepartmentsController::class,'destroy'])->name('departments.destroy');
Route::get('/departments/user/create/{department}',[DepartmentsController::class,'assignUserCreate'])->name('departments.assignUserCreate');
Route::post('/departments/user/{department}',[DepartmentsController::class,'assignUserStore'])->name('departments.assignUserStore');
Route::get('/departments/department/create/{department}',[DepartmentsController::class,'assignDepartmentCreate'])->name('departments.assignDepartmentCreate');
Route::post('/departments/department/{department}',[DepartmentsController::class,'assignDepartmentStore'])->name('departments.assignDepartmentStore');

Route::get('/departments/hierarchy', [DepartmentsController::class, 'hierarchy'])->name('departments.hierarchy');

Route::resource('/users',UsersController::class)->except([
	'edit'
])->names('users');
