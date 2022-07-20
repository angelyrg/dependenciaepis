<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocenteRequest;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        $docentes = Docente::all();
        return view("docentes.index", compact('docentes'));
    }


    public function create()
    {
        return view("docentes.create");
    }


    public function store(DocenteRequest $request)
    {
        Docente::create($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente '.$request->nombres.' registrado correctamente.');
    }


    public function edit(Docente $docente)
    {
        return view("docentes.edit", compact('docente'));
    }

    public function update(DocenteRequest $request, Docente $docente)
    {
        $docente->nombres = $request->nombres;
        $docente->apellidos = $request->apellidos;
        $docente->dni = $request->dni;
        $docente->estado = $request->estado;
        $docente->save();

        return redirect()->route('docentes.index')->with('success', 'Docente '.$request->nombres.' actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente.'); 
    }
}
