<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('bienes');
        Storage::makeDirectory('bienes');
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(tipoArticuloSeeder::class);
        $this->call(ArticuloSeeder::class);
    }
}
