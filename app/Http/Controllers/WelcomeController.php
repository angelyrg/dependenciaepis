<?php

namespace App\Http\Controllers;


use App\Models\Proyecto;

class WelcomeController extends Controller
{
    public function index()
    {
        $proyectos_completados = Proyecto::whereNotNull('proyecto_photo')->take(5)->get();
        return view('welcome', compact('proyectos_completados'));

    }

}
