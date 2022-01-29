<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@hotmail.com',
            'password' => bcrypt('12345678'),
        
        ]);
        \App\Models\User::factory(4)->create();
         \App\Models\Article::factory(10)->create();
        \App\Models\Image::factory(20)->create();


    }
}
