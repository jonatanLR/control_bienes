<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipoArticuloRequest;
use App\Http\Requests\StoreTpArticuloRequest;
use App\Models\TipoArticulo;
use Illuminate\Http\Request;

class TpArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.tipoArticulos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTpArticuloRequest $request)
    {
        //
        // if (TipoArticulo::create($request->all())) {
        //     $valTpArt = 1;
        // } 
        $valTpArt = TipoArticulo::create($request->all());

        if ($valTpArt->wasRecentlyCreated == true) {
            $new = 1;
        }
        
        return response($new);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTipoArticuloRequest $request, TipoArticulo $tpArticulo)
    {
        $tpArticulo->nombre = $request->nombre;
        $valtp = $tpArticulo->save();

        return response($valtp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoArticulo $tpArticulo)
    {
        $tpArticulo->delete();

        return redirect()->route('admin.tipo-articulos.index')->with('msgdelete', 'El Tipo de articulo fue eliminado');
    }
}
