<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'hora_id',
        'materia_id',
        'grupo_id',
        'aula_id',
        'dia_id',
        'ciclo_id'
    ];
}
