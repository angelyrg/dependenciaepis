<?php


namespace App\Traits;

use App\Models\Asesor;
use Exception;

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

}