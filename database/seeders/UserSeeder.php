<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'jonatan lopez',
            'email' => 'jonatan.lopez@unitec.edu',
            'password' => bcrypt('pass1234')
        ]);

        User::factory(50)->create();
    }
}
