<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Departamento;
use App\Http\Requests\StoreEmpleadoRequest;

use function GuzzleHttp\Promise\all;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.empleados.index', compact('empleados'));
        return view('admin.empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $deptos = Departamento::all();

        return view('admin.empleados.create', compact('deptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = new Empleado;
    
        $empleado->nombre = $request->nombre;
        $empleado->dni = $request->dni;
        $empleado->departamento_id = $request->depto;
        
        $empleado->save();

        return  redirect()->route('admin.empleados.edit', $empleado)->with('info','El empleado se creo con exito'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
        return view('admin.empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        $deptos = Departamento::all();

        return view('admin.empleados.edit', compact('empleado','deptos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmpleadoRequest $request, Empleado $empleado)
    {
        //
        // $empleado->update($request->all());
        // $empleado->nombre = $request->nombre;
        // $empleado->dni = $request->dni;
        // $empleado->departamento_id = $request->depto;
        // $empleado->save();

        // return $request;
        return redirect()->route('admin.empleados.show',$empleado)->with('info','El empleado se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
