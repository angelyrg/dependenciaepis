<?php

namespace App\Http\Controllers;

use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InformeRespController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'auth.responsable']);
    }

    public function index(){

        $informes = Informe::where('estado_responsable', '!=', null)->get();

        return view('responsable.informes.index', compact('informes'));
    }


    public function show(Informe $informe){
        return $informe;
    }
}
