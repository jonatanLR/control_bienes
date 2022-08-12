<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Departamento;
use App\Http\Requests\StoreEmpleadoRequest;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class EmpleadoController extends Controller
{
    public function index()
    {
        $deptos = Departamento::all();
        return view('admin.empleados.index', compact('deptos'));
        // return view('admin.empleados.index');
    }

    public function create()
    {
        //
        $deptos = Departamento::all();

        return view('admin.empleados.create', compact('deptos'));
    }

    public function store(StoreEmpleadoRequest $request)
    {

        $empleado = new Empleado;
        $empleado->nombre = $request->nombre;
        $empleado->dni = $request->dni;
        $empleado->departamento_id = $request->depto;

        $val = $empleado->save();

        return response($val);
    }

    public function show(Empleado $empleado)
    {
        //
        $deptos = Departamento::all();
        return view('admin.empleados.show', compact('empleado', 'deptos'));
    }

    
    public function edit(Empleado $empleado)
    {
        //
        $deptos = Departamento::all();

        return view('admin.empleados.edit', compact('empleado', 'deptos'));
    }

    public function update(StoreEmpleadoRequest $request, Empleado $empleado)
    {
        // $empleado->update($request->all());
        $empleado->nombre = $request->nombre;
        $empleado->dni = $request->dni;
        $empleado->departamento_id = $request->depto;
        $valupdate = $empleado->save();

        return response($valupdate);
    }


    public function destroy(Request $request, Empleado $empleado)
    {
        // dd($request);
        // exit;
        $empleado->delete();

        return redirect()->route('admin.empleados.index')->with('msgdelete', 'El Empleado fue eliminado');
    }
}
