<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';

    protected $fillable = [ 'nombres', 'apellidos', 'dni', 'cargo', 'estado', 'user_id' ];


    public function usuario(){
        return $this->hasOne(User::class);
    }
    
}
