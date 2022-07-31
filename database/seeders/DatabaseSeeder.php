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
            'name' => "Gilmer Matos",
            'username' => "20021234",
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
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
