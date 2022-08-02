<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InformeRespController extends Controller{

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index(){
        $informes = Informe::where('estado', '!=', null)->get();
        return view('responsable.informes.index', compact('informes'));
    }

    public function show(Informe $informe){
        return view('responsable.informes.show', compact('informe'));
    }


    public function update(Informe $informe, Request $request){
        $request->validate(['estado'=>'required|string']);

        $informe->estado = $request->estado;
        $informe->save();

        if($informe->estado == "Publicado" && $informe->proyecto->estado == "Inicio"){
            $project = Proyecto::findOrFail($informe->proyecto->id);
            $project->estado = "Parcial";
            $project->save();
        }else if($informe->estado == "Publicado" && $informe->proyecto->estado == "Parcial"){
            $project = Proyecto::findOrFail($informe->proyecto->id);
            $project->estado = "Completado";
            $project->save();
        }

        return redirect()->route('responsable.informes.show', $informe->id)->with('success', '¡Informe calificado!');
    }
}
