<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index(){
        $cargos = Cargo::all();
        return view("responsable.cargos.index", compact('cargos'));
    }


    public function store(Request $request){
        $request->validate(['cargo' => 'required']);

        $cargo = new Cargo();
        $cargo->cargo = $request->cargo;
        $cargo->save();
        return redirect()->route('cargos.index')->with('success', 'Cargo '.$request->cargo.' registrado correctamente.');
    }


    public function update(Request $request, Cargo $cargo){
        $request->validate(['cargo' => 'required']);
        $cargo->cargo = $request->cargo;
        $cargo->save();

        return redirect()->route('cargos.index')->with('success', 'Cargo '.$request->cargo.' actualizado correctamente.');
    }


    public function destroy(Cargo $cargo){
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado correctamente.'); 
    }
}
