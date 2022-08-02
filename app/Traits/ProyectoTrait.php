<?php


namespace App\Traits;

use App\Models\Asesor;
use App\Models\Informe;
use Exception;
use Illuminate\Support\Facades\File;

trait ProyectoTrait{

    public function addAsesor($asesores_id){

        foreach($asesores_id as $asesor_id){
            if($asesor_id != ""){
                $asesor = Asesor::findOrFail($asesor_id);
                $asesor->ctd_asesorados = $asesor->ctd_asesorados + 1;
                $asesor->save();
            }
        }
    }

    public function deleteAsesor($asesor_id){
        $asesor = Asesor::find($asesor_id);
        $asesor->ctd_asesorados = $asesor->ctd_asesorados - 1;
        $asesor->save();
    }

    public function deleteInforme($informe_id){
        $informe = Informe::findOrFail($informe_id);
        $file_path = public_path().'/files/informes/'.$informe->archivo;
        File::delete($file_path);

    }

}