<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudianteStoreRequest;
use App\Models\Estudiante;
use App\Traits\UserTrait;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    
    use UserTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }


    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('responsable.estudiantes.index', compact('estudiantes'));
    }



    public function store(EstudianteStoreRequest $request)
    {

        $request_data = $request->only('nombres', 'apellidos', 'codigo_matricula', 'email', 'proyecto_id');

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

            $estudiante = new Estudiante();
            $estudiante->nombres = $item['nombres'];
            $estudiante->apellidos = $item['apellidos'];
            $estudiante->codigo_matricula = $item['codigo_matricula'];
            $estudiante->email = $item['email'];
            $estudiante->user_id = $user_added;
            $estudiante->proyecto_id = $item['proyecto_id'];
            $estudiante->save();
        }

        return back()->with('success', 'Estudiantes agregados correctamente');
  
    }


    public function destroy(Estudiante $estudiante)
    {
        //return $estudiante;
        $this->deleteUser($estudiante->user_id);
        $estudiante->delete();

        return back()->with('success', 'Estudiante eliminado correctamente');
        

    }
}
