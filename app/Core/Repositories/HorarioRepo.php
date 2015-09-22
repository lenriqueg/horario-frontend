<?php

namespace App\Core\Repositories;

use App\Core\Entities\Ciclo;
use App\Core\Entities\Grupo;
use App\Core\Entities\Dia;
use App\Core\Entities\Hora;
use App\Core\Entities\Aula;
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
        $data = DB::select('SELECT grupo, turno, grupos.id, semestre FROM grupos
          join turnos on turnos.id = grupos.turno_id
          JOIN semestres on semestres.id = grupos.semestre_id
          where carrera_id = ? and grupos.status = 1
          order by turno_id, grupo',[$value]);
        return $data;
    }

    public function dias()
    {
        $dias = Dia::all();
        return $dias;
    }

    public function aulas()
    {
        $aulas = Aula::all();
        return $aulas;
    }

    public function horas($value)
    {
        $grupo      = Grupo::findOrFail($value);
        $horas = Hora::whereIn('turno_id', [$grupo->turno_id,3])->get();
        return $horas;
    }

    public function materias($value)
    {
        $grupo      = Grupo::findOrFail($value);
        $materias   = DB::select('select materia, grupo, materias.id as id from grupo_materia
          JOIN grupos on grupos.id = grupo_materia.grupo_id
          JOIN materias on materias.id = grupo_materia.materia_id
          where grupo_id = ?', [$grupo->id]);
        return $materias;
    }

    public function horario($value)
    {
        $horario = DB::select('SELECT hora, hora_id, materia, materia_id, grupo, grupo_id, aula, aula_id, dia, dia_id, ciclo from clon_horarios
			LEFT OUTER JOIN horas
				on horas.id = clon_horarios.hora_id
			LEFT OUTER JOIN materias
				on materias.id = clon_horarios.materia_id
			LEFT OUTER JOIN grupos
				on grupos.id = clon_horarios.grupo_id
			LEFT OUTER JOIN aulas
				on aulas.id = clon_horarios.aula_id
			LEFT OUTER JOIN dias
				on dias.id = clon_horarios.dia_id
			LEFT OUTER JOIN ciclos
				on ciclos.id = clon_horarios.ciclo_id
			where ciclo_id = 2
			and grupo_id = ?
			group By hora_id, dia_id',
            [$value]);
        return $horario;
    }

    public function create($value)
    {

    }
}