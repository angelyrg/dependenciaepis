<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class InformeDinamicoController extends Controller
{
    public function index(Request $request){

        $fecha_desde = $request->get('fecha_desde');
        $fecha_hasta = $request->get('fecha_hasta');

        $modalidad_id = $request->get('modalidad');
        $estado = $request->get('estado_proyecto');

 
        if (isset($fecha_desde) && isset($fecha_desde)){
            $proyectos = Proyecto::where('fecha_inicio', '>=', $fecha_desde."-01-01")
                        ->where('fecha_inicio', '<=', $fecha_hasta."-12-31")
                        ->where('estado', '==', $estado)
                        ->where('modalidad_id', '==', $modalidad_id)
                        ->get();
        }else{
            $proyectos = Proyecto::all();
        }

        $modalidades = Modalidad::all();

        return view('responsable.informesdinamicos.index', compact('proyectos', 'modalidades', 'fecha_desde', 'fecha_hasta', 'estado', 'modalidad_id'));
    }


}
