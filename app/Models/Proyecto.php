<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_grupo', 'modalidad_grupo', 'nombre_proyecto', 'descripcion', 'modalidad_id', ];

    public function modalidad(){
        return $this->belongsTo(Modalidad::class);
    }

    public function miembros(){
        return $this->hasMany(Ejecutor::class);
    }

    public function asesores(){
        return $this->belongsToMany(Asesor::class);
    }

    public function informes(){
        return $this->hasMany(Informe::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }

}
