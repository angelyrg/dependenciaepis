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
        $request_data = $request->only('nombres', 'apellidos', 'codigo_matricula', 'ciclo', 'proyecto_id');

        $data_traspuesta = array();
        if ($request_data) {
            foreach ($request_data as $row_key => $row) {
                foreach ($row as $column_key => $element) {
                    $data_traspuesta[$column_key][$row_key] = $element;
                    }
                }
        }

        $proyecto_id = $data_traspuesta[0]['proyecto_id'];

        foreach ($data_traspuesta as $item) {
            $user_added = $this->createUser( $item['nombres']." ".$item['apellidos'], $item['codigo_matricula'], $item['codigo_matricula'], 'Estudiante' );

            $ejecutor = new Ejecutor();
            $ejecutor->nombres = $item['nombres'];
            $ejecutor->apellidos = $item['apellidos'];
            $ejecutor->codigo_matricula = $item['codigo_matricula'];
            $ejecutor->ciclo = $item['ciclo'];
            $ejecutor->user_id = $user_added;
            $ejecutor->proyecto_id = $item['proyecto_id'];
            $ejecutor->save();
        }

        return back()->with('success', 'Integrantes agregados correctamente');
  
    }


    public function destroy(Ejecutor $ejecutor){
        $this->deleteUser($ejecutor->user_id);
        $ejecutor->delete();

        return back()->with('success', 'Integrante eliminado correctamente');

    }

}
