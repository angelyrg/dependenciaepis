<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class InformeDinamicoController extends Controller
{
    public function index(Request $request){

        $fecha_desde = $request->get('fecha_desde');
        $fecha_hasta = $request->get('fecha_hasta');

        if (isset($fecha_desde) && isset($fecha_desde)){
            $proyectos = Proyecto::where('fecha_inicio', '>=', $fecha_desde."-01-01")
                        ->where('fecha_inicio', '<=', $fecha_hasta."-12-31")
                        ->get();
        }else{
            $proyectos = Proyecto::all();
        }

        return view('responsable.informesdinamicos.index', compact('proyectos', 'fecha_desde', 'fecha_hasta'));
    }


}
