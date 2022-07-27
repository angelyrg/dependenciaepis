<?php

namespace App\Http\Controllers;

use App\Models\Reglamento;
use Illuminate\Http\Request;

class ReglamentoEstController extends Controller
{
    public function index(){
        $reglamentos = Reglamento::all();
        return view ('estudiante.reglamentos.index', compact('reglamentos'));
    }
}
