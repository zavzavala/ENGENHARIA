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
        // \App\Models\User::factory(10)->create();

        $this->call(MesSeeder::class);
        $this->call(ServicosSeeder::class);
        $this->call(tipo_empresa::class);
        $this->call(TypeSeeder::class);
        $this->call(UserSeeder::class);
        
    }
}
