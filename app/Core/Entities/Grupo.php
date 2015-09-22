<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public function materia()
    {
        return $this->belongsToMany('App\Core\Entities\Materia');
    }
}
