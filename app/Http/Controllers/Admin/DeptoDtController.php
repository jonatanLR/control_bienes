<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeptoDtController extends Controller
{
    // funcion para recuperar los registros de deptos y enviarlos al datatable
    public function deptos(){
        // $deptos = DB::table('departamentos')->get();
        $deptos = Departamento::all();

    //    return $empleados;
    return datatables()->of($deptos)->toJson();
   }
}
