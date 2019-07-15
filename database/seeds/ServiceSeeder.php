<?php

use Illuminate\Database\Seeder;
use App\Servicio;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Servicio::create([
            'name' => 'Juegos'
        ]);

        Servicio::create([
            'name' => 'Musica'
        ]);

        Servicio::create([
            'name' => 'TV'
        ]);
        
        Servicio::create([
            'name' => 'Map'
        ]);

    }
}
