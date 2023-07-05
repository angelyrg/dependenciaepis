<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secretaria;
use App\Traits\UserTrait;


class SecretariaController extends Controller
{
    use UserTrait;

    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index()
    {
        
        $secretarias = Secretaria::all();
        return view("responsable.secretarias.index", compact('secretarias'));
    }


    public function create()
    {
        return view("responsable.secretarias.create");
    }


    public function store(Request $request)
    {
        $user_added = $this->createUser($request->nombres." ".$request->apellidos,  $request->dni,  $request->dni,  'Secretaria');

        $secretaria = new Secretaria();
        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni;
        $secretaria->user_id = $user_added;
        $secretaria->save();        

        return redirect()->route('secretarias.index')->with('success', $request->nombres.' registrado correctamente.');
    }


    public function edit(Secretaria $secretaria)
    {
        return view("responsable.secretarias.edit", compact('secretaria'));
    }

    public function update(Request $request, Secretaria $secretaria)
    {
        $this->updateUser($secretaria->user_id, $request->nombres." ".$request->apellidos,  $request->dni, $request->dni );

        $secretaria->nombres = $request->nombres;
        $secretaria->apellidos = $request->apellidos;
        $secretaria->dni = $request->dni;
        $secretaria->save();
        
        return redirect()->route('secretarias.index')->with('success', $request->nombres.' actualizado correctamente.');

    }


    public function destroy(Secretaria $secretaria)
    {
        $this->deleteUser($secretaria->user_id);
        $secretaria->delete();
        
        return redirect()->route('secretarias.index')->with('success', 'Registro liminado correctamente.'); 
    }
}
