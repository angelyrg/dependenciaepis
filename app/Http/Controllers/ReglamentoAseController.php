<?php

namespace App\Http\Controllers;

use App\Models\Reglamento;
use Illuminate\Http\Request;

class ReglamentoAseController extends Controller
{
    public function index(){
        $reglamentos = Reglamento::all();
        return view ('asesor.reglamentos.index', compact('reglamentos'));
    }
}
