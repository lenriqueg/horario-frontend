<?php

namespace App\Core\Repositories;

use App\Core\Entities\Ciclo;
use App\Core\Entities\Grupo;
use App\Core\Entities\Dia;
use App\Core\Entities\Hora;
use App\Core\Entities\Aula;
use App\Core\Entities\Horario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HorarioRepo
{
    protected $materiaRepo;

    public function __construct(MateriaRepo $materiaRepo)
    {
        $this->materiaRepo = $materiaRepo;
    }
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

    public function findGrupo($value)
    {
        return DB::table('grupos')
            ->join('turnos', 'turnos.id', '=', 'grupos.turno_id')
            ->join('semestres', 'semestres.id', '=', 'grupos.semestre_id')
            ->where('grupos.id', $value)
            ->get();
    }

    public function dias()
    {
        $dias = Dia::all();
        return $dias;
    }

    public function aulas()
    {
        $aulas = Aula::where('status', 1)->get();
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
          join maestro_materia on maestro_materia.materia_id = materias.id
          join maestros on maestros.id = maestro_materia.maestro_id
          where grupo_id = ?
          AND materias.status <> 0
          AND maestros.status <> 0', [$grupo->id]);
        return $materias;
    }

    public function horario($value)
    {
        $horario = DB::select('SELECT hora, hora_id, materia, color, materia_id, grupo, grupo_id, aula, aula_id, dia, dia_id, ciclo from clon_horarios
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
			where ciclo_id = ?
			and grupo_id = ?
			group By hora_id, dia_id',
            [$this->ciclo()->id, $value]);
        return $horario;
    }

    public function beforeStore()
    {
        $maxHrs     = $this->materiaRepo->maxHrsMateria();
        $enpalme    = $this->materiaRepo->materiaMaestroEnpalme();

        $numRegistro = count(Horario::where('ciclo_id', Input::get('ciclo_id'))
            ->where('grupo_id', Input::get('grupo_id'))
            ->where('materia_id', Input::get('materia_id'))
            ->get());
        if($numRegistro < $maxHrs )
        {
            if($enpalme == null)
            {
                return true;
            }
            else {
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function createSkeleton()
    {
        $count = DB::table('clon_horarios')
            ->where('grupo_id', '=', Input::get('grupo_id'))->count();
        if ($count < 1) {
            $g = Grupo::find(Input::get('grupo_id'));
            $x = DB::select('SELECT * from horas where turno_id IN (?, 3)', [$g->turno_id]);
            $dias = Dia::all();
            foreach ($dias as $d) {
                foreach($x as $y) {
                    DB::table('clon_horarios')
                        ->insert([
                            'hora_id'		=> $y->id,
                            'materia_id'	=> 0,
                            'grupo_id'		=> Input::get('grupo_id'),
                            'aula_id'		=> 0,
                            'dia_id'		=> $d->id,
                            'ciclo_id'		=> Input::get('ciclo_id')
                        ]);
                }
            }
        }
        DB::update('UPDATE clon_horarios
					SET materia_id = ?, aula_id = ?
					where ciclo_id = ? and hora_id = ? and grupo_id = ? and dia_id = ?
					limit 1',
                    [
                        Input::get('materia_id'),
                        Input::get('aula_id'),
                        Input::get('ciclo_id'),
                        Input::get('hora_id'),
                        Input::get('grupo_id'),
                        Input::get('dia_id')
                    ]);
    }

    public function store()
    {
        if($this->beforeStore())
        {
            $horario = Horario::create(Input::all());
            $horario->save();
            $this->createSkeleton();
            return redirect()->back()->withErrors(['errors' => 'Guardado']);
        }
        return redirect()->back()->withInput()->withErrors(['errors' => 'Enpalme Guardar']);
    }

    public function update($value)
    {
        DB::table('clon_horarios')
            ->where('materia_id', Input::get('materia_id'))
            ->where('hora_id', Input::get('hora_id'))
            ->where('ciclo_id', Input::get('ciclo_id'))
            ->where('dia_id', Input::get('dia_id'))
            ->where('aula_id', Input::get('aula_id'))
            ->where('grupo_id', $value)
            ->update([
                'materia_id'    => 0,
                'aula_id'       => 0
            ]);
    }

    public function destroy($value)
    {
        Horario::where('materia_id', Input::get('materia_id'))
            ->where('hora_id', Input::get('hora_id'))
            ->where('ciclo_id', Input::get('ciclo_id'))
            ->where('dia_id', Input::get('dia_id'))
            ->where('aula_id', Input::get('aula_id'))
            ->where('grupo_id', $value)
            ->delete();

        $this->update($value);
    }
}