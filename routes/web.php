<?php


use App\Http\Controllers\GradsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentListController;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\delete;

Route::get('/',[StudentController::class , 'index'])->name('login');


Route::get('/student/{id}/login',[StudentController::class , 'loginShow']);
Route::get('/student/{user}',[StudentController::class , 'show'])->middleware('auth');
Route::post('/login',[StudentController::class , 'login']);


Route::get('/student/{id}/edit', [StudentController::class , 'edit'])->middleware('auth')->can('admin');
Route::post('/edit/{id}', [StudentController::class , 'update'])->middleware('auth')->can('admin');

Route::get('/create',[StudentController::class , 'create'])->middleware('auth')->can('admin');
Route::post('/create',[StudentController::class , 'store'])->middleware('auth')->can('admin');

Route::delete('/student/{id}',[StudentController::class , 'destroy'])->middleware('auth')->can('admin');


Route::get('/studentList', [StudentListController::class, 'index']);
Route::get('/studentList/{grad}', [StudentListController::class, 'show']);
Route::get('/create/list', [StudentListController::class, 'create'])->middleware('auth')->can('admin');
Route::post('/create/list', [StudentListController::class, 'store'])->middleware('auth')->can('admin');
Route::get('/edit/student/list/{id}', [StudentListController::class, 'edit'])->middleware('auth')->can('admin');
Route::post('/edit/student/list/{id}', [StudentListController::class, 'update'])->middleware('auth')->can('admin');




Route::get('/grads/{id}', [GradsController::class, 'index'])->middleware('auth');
Route::get('/grads/{category}/{id}', [GradsController::class, 'show'])->middleware('auth');
Route::get('/create/{id}/grads', [GradsController::class, 'create'])->middleware('auth')->can('admin');
Route::post('/create/{id}/grad', [GradsController::class, 'store'])->middleware('auth')->can('admin');
Route::delete('/grads/{id}/{category}', [GradsController::class, 'destroy'])->middleware('auth')->can('admin');



