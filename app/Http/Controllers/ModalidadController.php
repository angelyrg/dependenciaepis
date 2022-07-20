<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModalidadRequest;
use App\Models\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        $modalidades = Modalidad::all();
        return view("modalidades.index", compact('modalidades'));
    }


    public function create()
    {
        return view("modalidades.create");
    }


    public function store(ModalidadRequest $request)
    {
        Modalidad::create($request->all());
        return redirect()->route('modalidads.index')->with('success', 'Modalidad '.$request->nombre.' registrado correctamente.');
    }


    public function edit(Modalidad $modalidad)
    {
        return view("modalidades.edit", compact('modalidad'));
    }

    public function update(ModalidadRequest $request, Modalidad $modalidad)
    {
        $modalidad->nombre = $request->nombre;
        $modalidad->estado = $request->estado;
        $modalidad->save();

        return redirect()->route('modalidads.index')->with('success', 'Modalidad '.$request->nombre.' actualizado correctamente.');

    }


    public function destroy(Modalidad $modalidad)
    {
        $modalidad->delete();
        return redirect()->route('modalidads.index')->with('success', 'Modalidad eliminado correctamente.'); 
    }
}
