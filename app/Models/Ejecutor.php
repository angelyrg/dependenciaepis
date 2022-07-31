<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejecutor extends Model
{
    use HasFactory;

    public function proyecto(){
        return $this->belongsTo(Proyecto::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

}
