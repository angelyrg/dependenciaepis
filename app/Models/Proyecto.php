<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nombre_grupo', 'nombre_proyecto', 'descripcion', 'modalidad_id','asesor_id', 'coasesor_id', ];

    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }

}
