<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [EmpresaController::class,'inicio']);
Route::get('/empresa',[EmpresaController::class,'mostrarempresa']);
Route::post('/empresa/guardar',[EmpresaController::class,'guardarempresa'])->name('guardar-empresa');
Route::post('/empresa/update/{id}',[EmpresaController::class,'updateempresa'])->name('modificar-empresa');
Route::post('/empresa/delete',[EmpresaController::class,'eliminar'])->name('eliminar-empresa');
