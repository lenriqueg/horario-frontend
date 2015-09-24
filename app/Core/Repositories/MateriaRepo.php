<?php

namespace App\Core\Repositories;

use App\Core\Entities\Materia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MateriaRepo
{
    public function maxHrsMateria()
    {
        $data = Materia::findOrfail(Input::get('materia_id'));
        return $maxHrsMateria = $data->hrs_practicas + $data->hrs_teoricas;
    }

    public function materiaMaestroEnpalme()
    {
        $maestroId = Materia::join('maestro_materia', 'materias.id', '=', 'maestro_materia.materia_id')
            ->where('materia_id', '=', Input::get('materia_id'))
            ->select('materia', 'materia_id', 'maestro_id')
            ->first();

        $maestroMateria = DB::table('horarios')
            ->join('materias','materias.id', '=', 'horarios.materia_id')
            ->join('maestro_materia', 'maestro_materia.materia_id', '=', 'materias.id')
            ->join('maestros', 'maestros.id', '=', 'maestro_materia.maestro_id')
            ->where('hora_id', Input::get('hora_id'))
            ->where('horarios.ciclo_id', Input::get('ciclo_id'))
            ->where('dia_id', Input::get('dia_id'))
            ->where('maestro_id', $maestroId->maestro_id)
            ->get();

        //dd($maestroMateria);

        return $maestroMateria;
    }
}