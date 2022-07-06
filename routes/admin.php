<?php

use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmpleadoDatatableController;
use App\Models\Empleado;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');

// ruta para enviar los datos mediante el controlador al datatable
Route::get('datatable/empleados', [EmpleadoDatatableController::class,'empleado'])->name('admin.datatable.empleados');

Route::get('deptos', [DepartamentoController::class,'deptos'])->name('admin.deptos');
Route::resource('departamentos', DepartamentoController::class)->names('admin.departamentos');