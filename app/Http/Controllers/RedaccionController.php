<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Models\Proyecto;
use App\Models\Redaccion;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\isEmpty;

class RedaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redacciones = Redaccion::latest()->get();
        $grupos = Proyecto::all();
        $modalidades = Modalidad::all();
        
        $grupos_inscrito = Proyecto::where('estado', 'Inscrito')->get();
        $grupos_inicio = Proyecto::where('estado', 'Inicio')->get();
        $grupos_parcial = Proyecto::where('estado', 'Parcial')->get();
        $grupos_completado = Proyecto::where('estado', 'Completado')->get();

        return view('responsable.redaccion.index', compact('redacciones', 'modalidades', 'grupos_inscrito', 'grupos_inicio', 'grupos_parcial', 'grupos_completado') );
        // return view('responsable.redaccion.index', ['redacciones'=>$redacciones, "grupos"=>$grupos, "grupos_inicio"=>$grupos_inicio, "grupos_parcial"=>$grupos_parcial, "modalidades"=>$modalidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contenido_informe = [];

        // VALIDACION ID DEL PROYECTO PARA INFORME: INSCRIPCION, PARCIAL Y FINAL
        if (isset($request->proyecto_id)) {
            
            $proyecto_id = $request->proyecto_id;
    
            $proyecto = Proyecto::findOrFail($proyecto_id);
            if ( $proyecto->resolucion_aprobacion == null ) {
                return redirect()->back()->with("danger", "El proyecto debe tener el número de resolución de aprobación.");
            }
            $modalidad_proyecto = $proyecto->modalidad->nombre;
            $nombre_proyecto = $proyecto->nombre_proyecto;
            $modalidad_grupo = $proyecto->modalidad_grupo;
            $nombre_grupo = $proyecto->nombre_grupo;
            $numero_resolucion = $proyecto->resolucion_aprobacion;
            $asesor1 = $proyecto->asesores->first();
            $asesor2 = (count($proyecto->asesores) > 1) ? $proyecto->asesores->last() : "";
            $tipo_documento = $proyecto->modalidad->sigla;
    
            //Asesores
            if (count($proyecto->asesores) > 1){
                $asesores = $asesor1->nombres. " ". $asesor1->apellidos. " y a " . $asesor2->nombres. " ". $asesor2->apellidos;
            }else{
                $asesores = $asesor1->nombres. " ". $asesor1->apellidos;
            }

            $proyecto_contenido = [
                'modalidad_proyecto' => $modalidad_proyecto,
                'nombre_proyecto' => $nombre_proyecto,
                'modalidad_grupo' => $modalidad_grupo,
                'nombre_grupo' => $nombre_grupo,
                'numero_resolucion' => $numero_resolucion,
                'asesores' => $asesores,
            ];

            $contenido_informe = array_merge($contenido_informe, $proyecto_contenido);
        }


        $configuracion = Setting::latest()->first();
        $responsable = User::where('rol', 'Responsable')->latest()->first();
        if (!isset($configuracion->id)) {
            return redirect()->back()->with("danger", "Actualiza la Configuración / General");
        }

        $ultimo_informe = Redaccion::where("year_documento", $configuracion->year)->latest()->first();
        $numero_de_informe = !isset($ultimo_informe) ? 1 : ($ultimo_informe->numero_documento + 1);


        $nombre_director_epis = $configuracion->nombre_director;
        $fecha_actual = date('d/m/Y');
        $nombre_responsable = $responsable->name;

        $fecha_recepcion_solicitud = isset($request->fecha_recepcion_solicitud) ? $request->fecha_recepcion_solicitud : "";
        $asunto_solicitud = isset($request->asunto_solicitud) ? $request->asunto_solicitud : "";

        //plantillas
        $pantilla = [ 
            'APROBACION' => 'INFORME_APROBACION.docx',
            'PARCIAL' => 'INFORME_PARCIAL.docx',
            'FINAL' => 'INFORME_FINAL.docx',
            'ESPECIAL' => 'INFORME_ESPECIAL.docx',
        ];

        // TODO:
        //001-2023-EC
        $numero_informe_con_ceros = str_pad($numero_de_informe, 3, "0", STR_PAD_LEFT); 

        if (isset($request->proyecto_id)) {
            // NOMBRE: 001-2023-SSU-HATARIY
            $nombre_archivo = $numero_informe_con_ceros."-".$configuracion->year."-".$proyecto->modalidad->sigla."-".$nombre_grupo;
        }else{
            // NOMBRE: 001-2023-CASOS-ESPECIALES
            $nombre_archivo = $numero_informe_con_ceros."-".$configuracion->year."-CASOS-ESPECIALES";
            $tipo_documento = "ESP";
        }


        $contenido_general = [
            'numero_informe' => $numero_informe_con_ceros, 
            'nombre_director_epis' => $nombre_director_epis, 
            'fecha_actual' => $fecha_actual,
            'nombre_responsable' => $nombre_responsable,
            'fecha_recepcion_solicitud' => $fecha_recepcion_solicitud,
            'asunto_solicitud' => $asunto_solicitud
        ];

        $contenido_informe = array_merge($contenido_informe, $contenido_general);

        //Script phpWORD
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($pantilla[$request->tipo_informe]);
        $phpWord->setValues($contenido_informe);

        $carpetaRedaccion = 'files/redaccion/';
        (!file_exists($carpetaRedaccion)) ? mkdir($carpetaRedaccion, 0777, true) : '';

        $phpWord->saveAs($carpetaRedaccion."/".$nombre_archivo.'.docx');

        $nuevo = new Redaccion();
        $nuevo->numero_documento = $numero_de_informe;
        $nuevo->year_documento = $configuracion->year;
        $nuevo->nombre_documento = $nombre_archivo.".docx";
        $nuevo->tipo_documento = $tipo_documento;
        $nuevo->save();

        return redirect()->route('redaccion.index');
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
        $file_path = public_path().'/files/redaccion/'.$redaccion->nombre_documento;
        File::delete($file_path);
        $redaccion->delete();

        return redirect()->route('redaccion.index')->with('success', 'Documento eliminado correctamente.');
    }
}
