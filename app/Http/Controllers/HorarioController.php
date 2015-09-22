<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreHorarioRequest;
use App\Core\Repositories\HorarioRepo;

class HorarioController extends Controller
{
    protected $horarioRepo;

    public function __construct(HorarioRepo $horarioRepo)
    {
        $this->horarioRepo = $horarioRepo;
    }

    public function index()
    {
        $data = $this->horarioRepo->ciclo();
        return view('horario.index', compact('data'));
    }

    public function carreras()
    {
        $data = $this->horarioRepo->carrera();
        return view('horario.carreras', compact('data'));
    }

    public function grupos($id)
    {
        $data = $this->horarioRepo->grupo($id);
        return view('horario.grupos', compact('data'));
    }

    public function create($id)
    {
        $dias       = $this->horarioRepo->dias();
        $horas      = $this->horarioRepo->horas($id);
        $aulas      = $this->horarioRepo->aulas();
        $materias   = $this->horarioRepo->materias($id);
        $horario    = $this->horarioRepo->horario($id);
        $ciclo      = $this->horarioRepo->ciclo();
        return view('horario.create', compact('dias', 'horas', 'aulas', 'materias', 'horario', 'ciclo', 'id'));
    }

    public function store(StoreHorarioRequest $request)
    {
        return redirect()->back()->withErrors(['errors' => 'Guardado']);
    }
}
