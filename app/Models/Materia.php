<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model

    

{
    use HasFactory;
    
    protected $fillable = ['nombre', 'codigo'];

    // Relación con el modelo Horario
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}