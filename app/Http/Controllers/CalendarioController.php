<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index(){
        return view('responsable.calendario.index');
    }

    public function show(){
        
        $proyectos = Proyecto::all()
            ->map(function($item) {
                return [
                    'title' => $item->nombre_grupo,
                    'description' => $item->nombre_proyecto,                    
                    'start' => $item->fecha_inicio,
                    'end' => $item->fecha_fin,
                ];
            })->toArray();

        return response()->json($proyectos);
    }
}
