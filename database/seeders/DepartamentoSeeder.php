<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $departamentoArray = array("Infotecnologia");

        for ($i=0; $i < count($departamentoArray); $i++) { 
            $departamento = new Departamento();
            $departamento->nombre = $departamentoArray[$i];
            $departamento->save();
        }
    }
}
