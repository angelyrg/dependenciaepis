<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Estudiante;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoEstController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.estudiante']);
    }

    public function index(){
        $estudiante = Estudiante::where('user_id', Auth::user()->id )->first();
        return view('estudiante.proyectos.index', compact('estudiante'));
    }

    public function asesor(){
        $estudiante = Estudiante::where('user_id', Auth::user()->id )->first();
        return view('estudiante.proyectos.asesores', compact('estudiante'));
    }



}
