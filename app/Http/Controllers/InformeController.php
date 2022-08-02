<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformeStoreRequest;
use App\Models\Comentario;
use App\Models\Ejecutor;
use App\Models\Informe;
use App\Models\User;
use Illuminate\Http\Request;
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

        $informes_parciales = count(Informe::where('proyecto_id', $ejecutor->proyecto->id)->where('tipo', 'Informe Parcial')->get());
        $informes_finales= count(Informe::where('proyecto_id', $ejecutor->proyecto->id)->where('tipo', 'Informe Final')->get());

        

        if($ejecutor->proyecto->estado == "Inicio"){
            $tipo_informe = "Informe Parcial";
            $nombre_informe = "Entregable parcial ".($informes_parciales+1);
        }elseif($ejecutor->proyecto->estado == "Parcial"){
            $tipo_informe = "Informe Final";
            $nombre_informe = "Entregable final ".($informes_finales+1);
        }else{
            return "Proyecto completado";
        }

        $file = $request->file('archivo');
        $nombre_archivo = time().$file->getClientOriginalName();
        $file->move(public_path()."/files/informes/", $nombre_archivo);

        $informe = new Informe();
        $informe->nombre_informe = $nombre_informe;
        $informe->archivo = $nombre_archivo;
        $informe->estado_asesor = 'Pendiente';
        $informe->estado_coasesor = 'Pendiente';
        $informe->tipo = $tipo_informe;
        $informe->proyecto_id = $ejecutor->proyecto->id;
        $informe->save();

        return redirect()->route('informes.index')->with('success', '¡Informe subido con éxito!');
    }


    public function show(Informe $informe){
        $ejecutor = Ejecutor::where('user_id', Auth::user()->id)->first();

        $comentarios = User::join("comentarios","comentarios.user_id", "=", "users.id")
        ->where('comentarios.informe_id', '=', $informe->id )
        ->get();

        return view('ejecutor.informes.show', compact('informe', 'ejecutor', 'comentarios'));
    }

    public function update(Informe $informe){
        $informe->estado = "Pendiente";
        $informe->save();

        return redirect()->route('informes.index')->with('success', '¡Informe enviado!');
    }


    public function destroy(Informe $informe){
        
        $file_path = public_path().'/files/informes/'.$informe->archivo;
        File::delete($file_path);
        $informe->delete();

        return redirect()->route('informes.index')->with('success', '¡Informe eliminado con éxito!');


    }
}
