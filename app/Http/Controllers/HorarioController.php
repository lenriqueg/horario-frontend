<?php

namespace App\Http\Controllers;

use App\Core\Entities\Horario;
use App\Http\Requests;
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
}
