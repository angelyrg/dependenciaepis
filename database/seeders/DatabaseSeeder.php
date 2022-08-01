<?php

namespace Database\Seeders;

use App\Models\Asesor;
use App\Models\Cargo;
use App\Models\Modalidad;
use App\Models\User;
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
         //\App\Models\User::factory(10)->create();

        User::create([
            'name' => "Gilmer Matos Vila",
            'username' => "admin",
            'password' => '$2y$10$79lFQuJfbngvyHBnNGszVeS1TDJq/RqgM2Y0wFvax/i113v2aBsAu', // admin
            'rol' => 'Responsable' ]);


        Modalidad::create([
            'nombre' => "Servicio Social Universitario",
            'estado' => "Activo",]);

        Modalidad::create([
            'nombre' => "Extensión Cultural",
            'estado' => "Activo",]);
                
        Modalidad::create([
            'nombre' => "Proyección Social",
            'estado' => "Activo",]);


        Cargo::create([ 'cargo' => "Presidente(a)" ]);
        Cargo::create([ 'cargo' => "Tesorero(a)" ]);
        Cargo::create([ 'cargo' => "Secretario(a)" ]);
        Cargo::create([ 'cargo' => "Integrante" ]);
            
    }
}
