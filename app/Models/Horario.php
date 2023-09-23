<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = ['hora', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes'];
    // Relación con el modelo Grupo
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }

    // Métodos o relaciones adicionales si los necesitas

    public function getDias()
    {
        return [
            'lunes' => $this->lunes,
            'martes' => $this->martes,
            'miercoles' => $this->miercoles,
            'jueves' => $this->jueves,
            'viernes' => $this->viernes,
        ];
    }
}