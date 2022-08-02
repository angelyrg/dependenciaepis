<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Informe;
use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformeAseController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.asesor']);
    }

    public function index(){
        $asesor = Asesor::where('user_id', Auth::user()->id )->first();

        return view('asesor.informes.index', compact('asesor'));
    }

    public function show(Proyecto $proyecto){

        if ($proyecto->estado == "Inicio"){
            $porc_proyecto = 0;
        }elseif($proyecto->estado == "Parcial"){
            $porc_proyecto = 50;
        }elseif($proyecto->estado == "Completado"){
            $porc_proyecto = 100;
        }else{
            $porc_proyecto = 0;
        }


        return view('asesor.informes.show', compact('proyecto', 'porc_proyecto'));
        //return $proyecto;
    }

    public function comments(Informe $informe){

        $asesor = Asesor::where('user_id', Auth::user()->id)->first();

        $comentarios = User::join("comentarios","comentarios.user_id", "=", "users.id")
        ->where('comentarios.informe_id', '=', $informe->id )
        ->get();

        return view('asesor.informes.comments', compact('informe', 'asesor', 'comentarios'));
    }

    public function update(Informe $informe, Request $request){
        $request->validate(['estado_asesor'=> 'required|string']);
        $informe->estado_asesor = $request->estado_asesor;
        $informe->save();

        

        //return back()->with('success', 'Informe calificado');

        return redirect()->route('asesorados.proyecto', $informe->proyecto->id)->with('success', 'Informe calificado');

    }


}
