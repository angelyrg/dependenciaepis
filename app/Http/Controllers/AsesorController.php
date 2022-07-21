<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsesorRequest;
use App\Models\Asesor;
use App\Traits\UserTrait;


class AsesorController extends Controller
{
    use UserTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        $asesores = Asesor::all();
        return view("asesores.index", compact('asesores'));
    }


    public function create()
    {
        return view("asesores.create");
    }


    public function store(AsesorRequest $request)
    {
        $user_added = $this->createUser($request->nombres." ".$request->apellidos,  $request->dni,  $request->dni,  'Asesor');

        $asesor = new Asesor();
        $asesor->nombres = $request->nombres;
        $asesor->apellidos = $request->apellidos;
        $asesor->dni = $request->dni;
        $asesor->estado = '1'; //Activo
        $asesor->user_id = $user_added;
        $asesor->save();        

        return redirect()->route('asesors.index')->with('success', 'Asesor '.$request->nombres.' registrado correctamente.');
    }


    public function edit(Asesor $asesor)
    {
        return view("asesores.edit", compact('asesor'));
    }

    public function update(AsesorRequest $request, Asesor $asesor)
    {
        $this->updateUser($asesor->user_id, $request->nombres." ".$request->apellidos,  $request->dni, $request->dni );

        $asesor->nombres = $request->nombres;
        $asesor->apellidos = $request->apellidos;
        $asesor->dni = $request->dni;
        $asesor->save();
        
        return redirect()->route('asesors.index')->with('success', 'Asesor '.$request->nombres.' actualizado correctamente.');

    }


    public function destroy(Asesor $asesor)
    {
        $this->deleteUser($asesor->user_id);
        $asesor->delete();
        
        return redirect()->route('asesors.index')->with('success', 'Asesor eliminado correctamente.'); 
    }
}
