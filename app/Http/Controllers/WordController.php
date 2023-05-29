<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modalidad;

class WordController extends Controller
{
    public function index(){
        return view('responsable.redaccion.index');
    }

    public function create(){
        $modalidades = Modalidad::all();
        return view('responsable.redaccion.create', compact('modalidades'));
    }

    public function store(Request $request){
        $nombre_grupo = $request->nombre_grupo;
        $nombre_proyecto = $request->nombre_proyecto;

        // return $request;

        //Script phpWORD

        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('INFORME_INFORME_FINAL.docx');

        //Edit String
        $phpWord->setValues([
            'numero_informe' => $request->numero_informe, 
            'nombre_grupo' => $request->nombre_grupo, 
            'nombre_proyecto' => $request->nombre_proyecto,
            'modalidad_grupo' => $request->modalidad_grupo,
            'modalidad_proyecto' => $request->modalidad_proyecto,
        ]);

        $phpWord->saveAs('nuevoDocumento.docx');

    }
}
