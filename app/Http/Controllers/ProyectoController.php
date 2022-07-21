<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Models\Asesor;
use App\Models\Modalidad;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        $proyectos = Proyecto::all();
        return view("proyectos.index", compact('proyectos'));
    }


    public function create()
    {
        $modalidades = Modalidad::all();
        $asesores_disponibles = Asesor::select('id', 'nombres', 'apellidos')->where('estado', 1)->get();
        return view("proyectos.create", compact('modalidades', 'asesores_disponibles'));
    }


    public function store(Request $request)
    {
        //return $request;
        
        Proyecto::create($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto '.$request->codigo.' registrado correctamente.');
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
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente.'); 
    }
}
