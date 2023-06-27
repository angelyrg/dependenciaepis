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
        $configuracion = Setting::all()->last();

        if (!isset($configuracion->id)) {
            return redirect()->back()->with("danger", "Actualiza la Configuración / General");
        }

        $ultimo_informe = Redaccion::where("year_documento", $configuracion->year)->latest()->get();

        // return $ultimo_informe;
        
        $numero_de_informe = isset($ultimo_informe) ? ($ultimo_informe->numero_documento + 1) : 1;

        //VARIABLES PARA EL DOCUMENTO
        $numero_informe = ($numero_de_informe) . "-" . $configuracion->year; 
        $nombre_director_epis = $configuracion->nombre_director;
        $modalidad_proyecto = $proyecto->modalidad->nombre;
        $fecha_actual = date('d/m/Y');
        $nombre_proyecto = $proyecto->nombre_proyecto;
        $modalidad_grupo = $proyecto->modalidad_grupo;
        $nombre_grupo = $proyecto->nombre_grupo;
        $numero_resolucion = $request->numero_resolucion;
        $asesor1 = $proyecto->asesores->first->nombres;
        $asesor2 = count($proyecto->asesores) > 1 ? $proyecto->asesores->last->nombres : "";
        $nombre_responsable = $configuracion->responsable_id;

        return $asesor1;

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
        $nombre_archivo = $numero_informe."_".$nombre_grupo;

        //Script phpWORD
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('INFORME_APROBACION_PROYECTO.docx');
        $phpWord->setValues([
            'numero_informe' => $numero_informe, 
            'nombre_director_epis' => $nombre_director_epis, 
            'modalidad_proyecto' => $modalidad_proyecto,
            'fecha_actual' => $fecha_actual,
            'nombre_proyecto' => $nombre_proyecto,
            'modalidad_grupo' => $modalidad_grupo,
            'nombre_grupo' => $nombre_grupo,
            'numero_resolucion' => $numero_resolucion,
            'asesor1' => $asesor1,
            'asesor2' => $asesor2,
            'nombre_responsable' => $nombre_responsable,
        ]);

        $carpetaRedaccion = 'files/redaccion/';
        (!file_exists($carpetaRedaccion)) ? mkdir($carpetaRedaccion, 0777, true) : '';

        $phpWord->saveAs($carpetaRedaccion."/".$nombre_archivo.'.docx');

        // $nuevo = new Redaccion();
        // $nuevo->numero_documento = $ultimo_informe->numero_documento + 1;
        // $nuevo->year_documento = $configuracion->year;
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
