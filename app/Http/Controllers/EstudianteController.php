<?php

namespace App\Http\Controllers;

use App\Models\Ejecutor;
use App\Models\Estudiante;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function participacion(){
        if ($estudiantes = Estudiante::first()){
            $total_estudiantes = $estudiantes->total_estudiantes;
        }else{
            $total_estudiantes = 0; 
        }


        $proyectos_inicio = Proyecto::where('estado', 'Inicio')->get();
        $total_estudiantes_inicio = 0;
        foreach($proyectos_inicio as $proyecto_inicio){
            $total_estudiantes_inicio = $total_estudiantes_inicio + count($proyecto_inicio->miembros);
        }

        $proyectos_parcial = Proyecto::where('estado', 'Parcial')->get();
        $total_estudiantes_parcial = 0;
        foreach($proyectos_parcial as $proyecto_parcial){
            $total_estudiantes_parcial = $total_estudiantes_parcial + count($proyecto_parcial->miembros);
        }
        $proyectos_completado = Proyecto::where('estado', 'Completado')->get();
        $total_estudiantes_completado = 0;
        foreach($proyectos_completado as $proyecto_completado){
            $total_estudiantes_completado = $total_estudiantes_completado + count($proyecto_completado->miembros);
        }

        $data = [$total_estudiantes_inicio, $total_estudiantes_parcial, $total_estudiantes_completado, $total_estudiantes];

        return view('responsable.participacion.index', compact('data'));
    }
}
