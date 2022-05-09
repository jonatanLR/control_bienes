<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articulos = Articulo::factory(50)->create();

        foreach($articulos as $articulo){
            Image::factory(1)->create([
                'articulo_id' => $articulo->id
            ]);
        }
    }
}
