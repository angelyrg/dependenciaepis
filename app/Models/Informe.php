<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

}
