<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class InformeDinamicoController extends Controller
{
    public function index(){
        $proyectos = Proyecto::all();
        return view('responsable.informesdinamicos.index', compact('proyectos'));
    }

    public function filtrar(Request $request){

        $proyectos = Proyecto::where('fecha_inicio', '>=', $request->fecha_desde)
                    ->where('fecha_fin', '<=', $request->fecha_hasta)
                    ->get();

        return view('responsable.informesdinamicos.index', compact('proyectos'));

    }
}
