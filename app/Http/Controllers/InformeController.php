<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeStoreRequest;
use App\Models\Estudiante;
use App\Models\Informe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class InformeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.estudiante']);
    }

    public function index(){
        $estudiante = Estudiante::where('user_id', Auth::user()->id)->first();
        if ($estudiante->proyecto->estado == "Inicio"){
            $porc_proyecto = 0;
        }elseif($estudiante->proyecto->estado == "Parcial"){
            $porc_proyecto = 50;
        }elseif($estudiante->proyecto->estado == "Completado"){
            $porc_proyecto = 100;
        }else{
            $porc_proyecto = 0;
        }

        return view('estudiante.informes.index', compact('estudiante', 'porc_proyecto'));
    }


    public function create(){
        $estudiante = Estudiante::where('user_id', Auth::user()->id)->first();
        return view('estudiante.informes.create', compact('estudiante'));
    }


    public function store(InformeStoreRequest $request){
        $estudiante = Estudiante::where('user_id', Auth::user()->id )->first();

        if($estudiante->proyecto->estado == "Inicio"){
            $tipo_informe = "Informe Parcial";
        }elseif($estudiante->proyecto->estado == "Parcial"){
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
        $informe->proyecto_id = $estudiante->proyecto->id;
        $informe->save();

        return redirect()->route('informes.index')->with('success', '¡Informe subido con éxito!');
        
    }


    public function show(Informe $informe){
        return view('estudiante.informes.show', compact('informe'));
    }


    public function destroy(Informe $informe){
        
        $file_path = public_path().'/files/informes/'.$informe->archivo;
        File::delete($file_path);
        $informe->delete();

        return redirect()->route('informes.index')->with('success', '¡Informe eliminado con éxito!');


    }
}
