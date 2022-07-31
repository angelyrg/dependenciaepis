<?php

namespace App\Http\Controllers;

use App\Http\Requests\EjecutorStoreRequest;
use App\Models\Ejecutor;
use App\Traits\UserTrait;
use Illuminate\Http\Request;

class EjecutorController extends Controller
{
    use UserTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }


    public function index(){
        $ejecutores = Ejecutor::all();
        return view('responsable.ejecutores.index', compact('ejecutores'));
    }


    public function store(EjecutorStoreRequest $request){
        //return $request;
        $user_added = $this->createUser( $request->nombres." ".$request->apellidos,  $request->codigo_matricula,  $request->codigo_matricula, 'Ejecutor' );

        $ejecutor = new Ejecutor();
        $ejecutor->nombres = $request->nombres;
        $ejecutor->apellidos = $request->apellidos;
        $ejecutor->codigo_matricula = $request->codigo_matricula;
        $ejecutor->ciclo = $request->ciclo;
        $ejecutor->user_id = $user_added;
        $ejecutor->proyecto_id = $request->proyecto_id;
        $ejecutor->cargo_id = $request->cargo_id;
        $ejecutor->save();

        return back()->with('success', 'Integrantes agregados correctamente');
    }


    public function destroy(Request $request){
        
        $ejecutor = Ejecutor::findOrFail($request->ejecutor_id);

        $this->deleteUser($ejecutor->user_id);
        $ejecutor->delete();

        return back()->with('success', 'Integrante eliminado correctamente');

    }

}
