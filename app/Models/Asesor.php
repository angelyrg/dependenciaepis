<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;


    protected $table = 'asesors';

    protected $fillable = [ 'nombres', 'apellidos', 'dni',  'user_id' ];


    public function usuario(){
        return $this->hasOne(User::class);
    }

    public function asesorados(){
        return $this->belongsToMany(Proyecto::class);
    }

}
