<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Proyecto;
use App\Models\Redaccion;
use App\Models\Setting;
use Illuminate\Http\Request;

class RedaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redacciones = Redaccion::all();
        $grupos = Proyecto::all();
        return view('responsable.redaccion.index', ['redacciones'=>$redacciones, "grupos"=>$grupos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::latest()->first();

        // $current_year = $setting->year;

        // $redaccion = Redaccion::latest()->Where('year')->first();
        
        // $lastRedaccion = isset($redaccion->redaccion_codigo) ? (int)$redaccion->redaccion_codigo : 1;
        // $lastRedaccion = str_pad($lastRedaccion, 2, "0", STR_PAD_LEFT);

        return view('responsable.redaccion.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto_id = $request->proyecto_id;

        $proyecto = Proyecto::findOrFail($proyecto_id);

        $configuracion = Setting::first()->get();

        return $configuracion;

        $ultimo_informe = Redaccion::all();

        

        // - numero_informe		:CONTROLLER
        // - nombre_director_epis	:CONTROLLER
        // - modalidad_proyecto	:FORM => CONTROLLER
        // - fecha_actual			:CONTROLLER
        // - nombre_proyecto		:FORM => CONTROLLER
        // - modalidad_grupo		:FORM => CONTROLLER
        // - nombre_grupo			:FORM)
        // - numero_resolucion		:FORM)
        // - asesor1				:CONTROLLER
        // - asesor2				:CONTROLLER
        // - nombre_responsable	:CONTROLLER


        // NOMBRE: 001-2023-SSU-HATARIY
        //

        $nombre_archivo = $request->numero_informe."_".$request->nombre_grupo;


        //Script phpWORD
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('INFORME_INFORME_FINAL.docx');

        //Edit String
        //TODO: Add date =============
        $phpWord->setValues([
            'numero_informe' => $request->numero_informe, 
            'nombre_grupo' => $request->nombre_grupo, 
            'nombre_proyecto' => $request->nombre_proyecto,
            'modalidad_grupo' => $request->modalidad_grupo,
            'modalidad_proyecto' => $request->modalidad_proyecto,
        ]);

        $carpetaRedaccion = 'files/redaccion/';
        if (!file_exists($carpetaRedaccion)) {
            mkdir($carpetaRedaccion, 0777, true);
        }

        $phpWord->saveAs($carpetaRedaccion."/".$nombre_archivo.'.docx');

        // $nuevo = new Redaccion();
        // $nuevo->redaccion_codigo = $request->numero_informe;
        // $nuevo->nombre_documento = $nombre_archivo.".docx";
        // $nuevo->save();

        // return redirect()->route('redaccion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Redaccion  $redaccion
     * @return \Illuminate\Http\Response
     */
    public function show(Redaccion $redaccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Redaccion  $redaccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Redaccion $redaccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Redaccion  $redaccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redaccion $redaccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Redaccion  $redaccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Redaccion $redaccion)
    {
        //
    }
}
