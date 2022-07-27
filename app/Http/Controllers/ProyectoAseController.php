<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoAseController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.asesor']);
    }

    public function index(){
        $asesor = Asesor::where('user_id', Auth::user()->id )->first();
        //return $asesor;
        return view('asesor.proyectos.index', compact('asesor'));
    }

    public function show(Proyecto $proyecto){
        return view('asesor.proyectos.show', compact('proyecto'));
    }
}
