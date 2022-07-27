<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Ejecutor;
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
        $ejecutor = Ejecutor::where('user_id', Auth::user()->id )->first();
        return view('ejecutor.proyectos.index', compact('ejecutor'));
    }

    public function asesor(){
        $ejecutor = Ejecutor::where('user_id', Auth::user()->id )->first();
        return view('ejecutor.proyectos.asesores', compact('ejecutor'));
    }



}
