<?php

use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmpleadoDatatableController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');

// ruta para enviar los datos mediante el controlador al datatable
Route::get('datatable/empleados', [EmpleadoDatatableController::class,'empleado'])->name('admin.empleados.empleado');

// Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');