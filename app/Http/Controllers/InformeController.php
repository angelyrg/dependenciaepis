<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeStoreRequest;
use App\Models\Ejecutor;
use App\Models\Informe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InformeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.estudiante']);
    }

    public function index(){
        $ejecutor = Ejecutor::where('user_id', Auth::user()->id)->first();
        if ($ejecutor->proyecto->estado == "Inicio"){
            $porc_proyecto = 0;
        }elseif($ejecutor->proyecto->estado == "Parcial"){
            $porc_proyecto = 50;
        }elseif($ejecutor->proyecto->estado == "Completado"){
            $porc_proyecto = 100;
        }else{
            $porc_proyecto = 0;
        }

        return view('ejecutor.informes.index', compact('ejecutor', 'porc_proyecto'));
    }


    public function create(){
        $ejecutor = Ejecutor::where('user_id', Auth::user()->id)->first();
        return view('ejecutor.informes.create', compact('ejecutor'));
    }


    public function store(InformeStoreRequest $request){
        $ejecutor = Ejecutor::where('user_id', Auth::user()->id )->first();

        if($ejecutor->proyecto->estado == "Inicio"){
            $tipo_informe = "Informe Parcial";
        }elseif($ejecutor->proyecto->estado == "Parcial"){
            $tipo_informe = "Informe final";
        }else{
            return "Proyecto completado";
        }

        $file = $request->file('archivo');
        $nombre_archivo = time().$file->getClientOriginalName();
        $file->move(public_path()."/files/informes/", $nombre_archivo);

        $informe = new Informe();
        $informe->nombre_informe = $request->nombre_informe;
        $informe->descripcion = $request->descripcion;
        $informe->archivo = $nombre_archivo;
        $informe->estado = 'Pendiente';
        $informe->tipo = $tipo_informe;
        $informe->proyecto_id = $ejecutor->proyecto->id;
        $informe->save();

        return redirect()->route('informes.index')->with('success', '¡Informe subido con éxito!');
        
    }


    public function show(Informe $informe){
        return view('ejecutor.informes.show', compact('informe'));
    }


    public function destroy(Informe $informe){
        
        $file_path = public_path().'/files/informes/'.$informe->archivo;
        File::delete($file_path);
        $informe->delete();

        return redirect()->route('informes.index')->with('success', '¡Informe eliminado con éxito!');


    }
}
