<?php

namespace App\Http\Controllers;


use App\Models\Proyecto;

class WelcomeController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::get(5);
        return view('welcome', compact('proyectos'));

    }

}
