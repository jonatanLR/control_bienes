<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoDatatableController extends Controller
{
    // funcion para recuperar los registros de usuario y enviarlos al datatable
    public function empleado(){
        $empleados = Empleado::join('departamentos','empleados.departamento_id','=','departamentos.id')
                                   ->get(['empleados.id','empleados.nombre','empleados.dni','departamentos.nombre as depto','departamentos.id as id_depto']);

    //    return $empleados;
    return datatables()->of($empleados)->toJson();
   }
}
