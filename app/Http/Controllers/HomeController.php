<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Ejecutor;
use App\Models\Informe;
use App\Models\Modalidad;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::user()->rol == "Responsable"){

            foreach (Modalidad::all() as $modalidad) {            
                $inicios[] = Proyecto::where('estado', 'Inicio')->where('modalidad_id', $modalidad->id)->get()->count();
                $parcials[] = Proyecto::where('estado', 'Parcial')->where('modalidad_id', $modalidad->id)->get()->count();
                $completados[] = Proyecto::where('estado', 'Completado')->where('modalidad_id', $modalidad->id)->get()->count();
                $totals[] = Proyecto::where('modalidad_id', $modalidad->id)->get()->count();
                $modalidads[] = $modalidad->nombre;
            }
            $data[] = $inicios;
            $data[] = $parcials; 
            $data[] = $completados;
            $data[] = $totals;
            $data[] = $modalidads;


            return view('home', ['data' => $data]);        


        }    
        elseif (Auth::user()->rol == "Ejecutor"){
            $ejecutor = Ejecutor::where('user_id', Auth::user()->id)->first();
            if ($ejecutor->proyecto->estado == "Inicio"){ $porc_proyecto = 0;}
            elseif($ejecutor->proyecto->estado == "Parcial"){$porc_proyecto = 50;}
            elseif($ejecutor->proyecto->estado == "Completado"){$porc_proyecto = 100;
            }else{$porc_proyecto = 0;}

            return view('home', ['ejecutor' => $ejecutor, 'porc_proyecto' => $porc_proyecto]);        


        }elseif(Auth::user()->rol == "Asesor"){

            $asesor = Asesor::where('user_id', Auth::user()->id)->first();
            return view('home', ['asesor'=>$asesor]);        
        }

    }


    public function getNotifications(){

        $informes_pendientes = Informe::where('estado', 'Pendiente')->get();

        foreach($informes_pendientes as $infor){

            $noti[] = [ 
                        $infor->proyecto->nombre_grupo, 
                        $infor->proyecto->nombre_proyecto,
                        $infor->nombre_informe,
                        $infor->id
                        ];
        }
        $notifications = $noti;

        return response()->json($notifications);
        
    }
}
