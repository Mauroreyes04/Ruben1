<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    // Relación con el modelo Horario
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    // Métodos o relaciones adicionales si los necesitas
}
