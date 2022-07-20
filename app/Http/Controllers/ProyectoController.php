<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
use App\Models\Modalidad;
use App\Models\Proyecto;

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
        return view("proyectos.create", compact('modalidades'));
    }


    public function store(ProyectoRequest $request)
    {
        Proyecto::create($request->all());
        return redirect()->route('proyectos.index')->with('success', 'Proyecto '.$request->codigo.' registrado correctamente.');
    }


    public function edit(Proyecto $proyecto)
    {
        $modalidades = Modalidad::all();
        return view("proyectos.edit", compact('proyecto', 'modalidades'));
    }

    public function update(ProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->codigo = $request->codigo;
        $proyecto->nombre_proyecto = $request->nombre_proyecto;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->modalidad_id = $request->modalidad_id;
        $proyecto->estado = $request->estado;
        $proyecto->save();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto '.$request->codigo.' actualizado correctamente.');

    }


    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente.'); 
    }
}
