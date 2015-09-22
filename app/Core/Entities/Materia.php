<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public function grupo()
    {
        return $this->belongsToMany('App\Core\Entities\Grupo');
    }
}
