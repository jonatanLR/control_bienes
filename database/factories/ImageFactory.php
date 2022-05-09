<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'bienes/' . $this->faker->image('public/storage/bienes',640,480,null,false)//bienes/imagen.jpg
        ];
    }
}
