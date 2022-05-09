<?php

namespace Database\Factories;

use App\Models\Empleado;
use App\Models\TipoArticulo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ficha' => $this->faker->numerify('F#####'),
            'descripcion' => $this->faker->sentence(),
            'cargado' => $this->faker->randomElement([0,1]),
            'empleado_id' => Empleado::all()->random()->id,
            'tipo_articulo_id' => TipoArticulo::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
