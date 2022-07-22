<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Models\Asesor;
use App\Models\Estudiante;
use App\Models\Modalidad;
use App\Models\Proyecto;
use App\Models\User;
use App\Traits\UserTrait;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    use UserTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        $proyectos = Proyecto::all();
        $modalidades = Modalidad::select('id', 'nombre')->where('estado', 'Activo')->get();
        return view("proyectos.index", compact('proyectos', 'modalidades'));
    }


    public function create()
    {
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('estado', 1)->get();
        return view("proyectos.create", compact('modalidades', 'asesores_disponibles'));
    }


    public function store(Request $request)
    {
        $proyecto = Proyecto::create($request->all());

        
        $asesor = Asesor::findOrFail($proyecto->asesor_id);
        if ($proyecto->coasesor_id != null){
            $coasesor = Asesor::findOrFail($proyecto->coasesor_id);
        }else{
            $coasesor = null;
        }

        $estudiantes = Estudiante::where('proyecto_id', $proyecto->id)->orderBy('codigo_matricula')->get();

        return view('proyectos.show', compact('proyecto', 'estudiantes', 'asesor', 'coasesor'));
    }

    public function show(Proyecto $proyecto)
    {
        $asesor = Asesor::findOrFail($proyecto->asesor_id);
        if ($proyecto->coasesor_id != null){
            $coasesor = Asesor::findOrFail($proyecto->coasesor_id);
        }else{
            $coasesor = null;
        }

        $estudiantes = Estudiante::where('proyecto_id', $proyecto->id)->orderBy('codigo_matricula')->get();
        return view('proyectos.show', compact('proyecto', 'estudiantes', 'asesor', 'coasesor'));
    }


    public function edit(Proyecto $proyecto)
    {
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('estado', 1)->get();
        return view("proyectos.edit", compact('proyecto', 'modalidades', 'asesores_disponibles'));
    }

    public function update(ProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->codigo = $request->codigo;
        $proyecto->nombre_grupo = $request->nombre_grupo;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->modalidad_id = $request->modalidad_id;
        $proyecto->asesor_id = $request->asesor_id;
        $proyecto->coasesor_id = $request->coasesor_id;
        
        $proyecto->save();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto '.$request->codigo.' actualizado correctamente.');

    }


    public function destroy(Proyecto $proyecto)
    {

        foreach ($proyecto->miembros as $miembro) {
            $this->deleteUser($miembro->user_id);
        }

        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente.'); 
    }
}
