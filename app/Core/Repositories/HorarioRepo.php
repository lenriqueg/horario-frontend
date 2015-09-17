<?php

namespace App\Core\Repositories;

use App\Core\Entities\Ciclo;
use Illuminate\Support\Facades\DB;

class HorarioRepo
{
    public function ciclo()
    {
        $data = Ciclo::where('status', 1)->first();
        return $data;
    }

    public function carrera()
    {
        $data = DB::select('SELECT * FROM carreras');
        return $data;
    }

    public function grupo($value)
    {
        $data = DB::select('SELECT * FROM grupos
          join turnos on turnos.id = grupos.turno_id
          where carrera_id = ? and status = 1
          order by turno_id, grupo',[$value]);
        return $data;
    }
}