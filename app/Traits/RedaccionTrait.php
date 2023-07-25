<?php


namespace App\Traits;

use App\Models\Proyecto;
use App\Models\Redaccion;
use App\Models\Setting;
use App\Models\User;

trait RedaccionTrait{

    public function createRedaction($proyecto_id, $tipo_informe){
        $contenido_informe = [];

        $proyecto = Proyecto::findOrFail($proyecto_id);

        $modalidad_proyecto = $proyecto->modalidad->nombre;
        $nombre_proyecto = $proyecto->nombre_proyecto;
        $modalidad_grupo = $proyecto->modalidad_grupo;
        $nombre_grupo = $proyecto->nombre_grupo;
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
            'asesores' => $asesores,
        ];

        $contenido_informe = array_merge($contenido_informe, $proyecto_contenido);


        $configuracion = Setting::latest()->first();
        $responsable = User::where('rol', 'Responsable')->latest()->first();
        if (!isset($configuracion->id)) {
            return redirect()->back()->with("danger", "Actualiza la Configuración / General para redactar el informe.");
        }

        $ultimo_informe = Redaccion::where("year_documento", $configuracion->year)->latest()->first();
        $numero_de_informe = !isset($ultimo_informe) ? 1 : ($ultimo_informe->numero_documento + 1);


        $nombre_director_epis = $configuracion->nombre_director;
        $fecha_actual = date('d/m/Y');
        $nombre_responsable = $responsable->name;

        $reglamento_nombre = $configuracion->reglamento_nombre;
        $reglamento_nro_resolucion = $configuracion->reglamento_nro_resolucion;
        $anexo_informe_aprobacion = $configuracion->anexo_informe_aprobacion;
        $anexo_informe_parcial = $configuracion->anexo_informe_parcial;
        $anexo_informe_final = $configuracion->anexo_informe_final;
        $anexo_informe_especial = $configuracion->anexo_informe_especial;

        //plantillas
        $pantilla = [
            'PARCIAL' => 'INFORME_PARCIAL.docx',
            'FINAL' => 'INFORME_FINAL.docx',
        ];

        $numero_informe_con_ceros = str_pad($numero_de_informe, 3, "0", STR_PAD_LEFT); 

        $nombre_archivo = $numero_informe_con_ceros."-".$configuracion->year."-".$proyecto->modalidad->sigla."-".$nombre_grupo;
        

        $contenido_general = [
            'numero_informe' => $numero_informe_con_ceros, 
            'nombre_director_epis' => $nombre_director_epis, 
            'fecha_actual' => $fecha_actual,
            'nombre_responsable' => $nombre_responsable,
            'reglamento_nombre' => $reglamento_nombre,
            'reglamento_nro_resolucion' => $reglamento_nro_resolucion,
            'anexo_informe_aprobacion' => $anexo_informe_aprobacion,
            'anexo_informe_parcial' => $anexo_informe_parcial,
            'anexo_informe_final' => $anexo_informe_final,
            'anexo_informe_especial' => $anexo_informe_especial
        ];

        $contenido_informe = array_merge($contenido_informe, $contenido_general);

        // Crea la carpeta de informes si es que no existe
        $carpetaRedaccion = 'files/redaccion/';
        (!file_exists($carpetaRedaccion)) ? mkdir($carpetaRedaccion, 0777, true) : '';

        //Script phpWORD
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($pantilla[$tipo_informe]);
        $phpWord->setValues($contenido_informe);
        $phpWord->saveAs($carpetaRedaccion."/".$nombre_archivo.'.docx');

        $informe_file = new Redaccion();
        $informe_file->numero_documento = $numero_de_informe;
        $informe_file->year_documento = $configuracion->year;
        $informe_file->proyecto_id = $proyecto_id;
        $informe_file->nombre_documento = $nombre_archivo.".docx";
        $informe_file->tipo_documento = $tipo_documento;
        $informe_file->tipo_informe = $tipo_informe;
        $informe_file->save();

        return $informe_file->id;
    }

}




