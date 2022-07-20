<?php

namespace Database\Seeders;

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
        User::create([
            'name' => "Luis Pacheco",
            'username' => "10011234",
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'rol' => 'Asesor' ]);
        User::create([
            'name' => "Waldir Chunchuay",
            'username' => "20191234",
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'rol' => 'Estudiante' ]);

        Modalidad::create(
            [
            'nombre' => "Servicio Social Universitario",
            'estado' => "Activo",
            ]
        );
        Modalidad::create(
            [
            'nombre' => "Proyección Social",
            'estado' => "Activo",
            ]
        );
        Modalidad::create(
            [
            'nombre' => "Extensión Cultural",
            'estado' => "Activo",
            ]
        );

    }
}
