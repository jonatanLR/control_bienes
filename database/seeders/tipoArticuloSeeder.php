<?php

namespace Database\Seeders;

use App\Models\TipoArticulo;
use Illuminate\Database\Seeder;

class tipoArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipoArticulosArray = array("LAPTOP", "CPU", "MONITOR", "TECLADO", "MOUSE", "SIST. VIDEO CONFERENCIA", "CAMARAS DE SEGURIDAD", "RELOJ BIOMETRICO", "VIDEO DVR VIGILANCIA", "CREDENZA", "MESA  COMPUTADORA  EST. MET.", "MODULAR", "SILLA GIRATORIA", "CAJONERA", "UPS", "SILLAS FIJAS", "CAJONERA DE PARED", "REPISA AEREA", "TELEFONO IP", "AIRE ACONDICIONADO", "MESA DE CONFERENCIA", "ESTANTE ESTRUCTURA METALICA", "BANCO GIRATORIO  METAL", "OASIS", "TELEVISOR", "IMPRESORA", "ARCHIVO METAL  (4 GAVETAS)", "MESA REDONDA", "SCANER", "ACCESS POINT- PUNTO DE ACCESO", "PIZARRA", "SWITCH", "CENTRAL TELEFONICA", "FIREWALL-EQUIPO DE SEGURIDAD DE RED", "PUNTO DE ACCESO- ROUTER", "SUPERFICIE DE TRABAJO", "ESCRITORIO ESTRUCTURA METALICA", "ARCHIVO METALICAS  ( 3 GAVETAS )", "MESA MADERA");

        for ($i=0; $i < count($tipoArticulosArray); $i++) { 
            $tipoArticulos = new TipoArticulo();
            $tipoArticulos->nombre = $tipoArticulosArray[$i];
            $tipoArticulos->save();
        }
    }
}
