<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoArticulo;
use Illuminate\Http\Request;

class TpArticuloDtController extends Controller
{
    //
    public function tipoArticulos()
    {
        $tipoArticulos = TipoArticulo::all();
        return datatables()->of($tipoArticulos)->toJson();
    }
}
