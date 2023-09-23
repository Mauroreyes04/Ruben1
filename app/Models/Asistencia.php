<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    
    protected $table = 'asistencias';

    protected $fillable = [
        'id',
        'estado',
        'id_usuario',
        'fecha',
    ];

    // Relación con el modelo Usuario

    public function asistencia(){
        return $this->belongsTo(User::class, 'id','usuario_id');

    }
}
