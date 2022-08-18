<?php

use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\DeptoDtController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmpleadoDatatableController;
use App\Http\Controllers\Admin\TpArticuloController;
use App\Http\Controllers\Admin\TpArticuloDtController;
use App\Models\Empleado;
use App\Models\TipoArticulo;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

// rutas para empleados
Route::resource('empleados', EmpleadoController::class)->names('admin.empleados')->only(['index','store','update','destroy']);
// rutas departamentos
Route::resource('departamentos', DepartamentoController::class)->names('admin.departamentos')->only(['index','store','update','destroy']);
// rutas para tipo de articulos
Route::resource('tp-articulos', TpArticuloController::class)->names('admin.tipo-articulos')->only(['index','store','update','destroy']);

// ruta para enviar los datos mediante el controlador al datatable
Route::get('datatable/empleados', [EmpleadoDatatableController::class,'empleado'])->name('admin.datatable.empleados');
Route::get('datatable/deptos', [DeptoDtController::class, 'deptos'])->name('admin.datatable.deptos');
Route::get('datatable/tp-articulos', [TpArticuloDtController::class,'tipoArticulos'])->name('admin.datatable.tipo-articulos');
// Route::get('deptos', [DepartamentoController::class,'deptos'])->name('admin.deptos');

