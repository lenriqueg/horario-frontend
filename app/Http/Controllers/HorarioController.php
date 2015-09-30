<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreHorarioRequest;
use App\Core\Repositories\HorarioRepo;
use App\Core\Repositories\MateriaRepo;

class HorarioController extends Controller
{
    protected $horarioRepo;
    protected $materiaRepo;

    public function __construct(HorarioRepo $horarioRepo, MateriaRepo $materiaRepo)
    {
        $this->horarioRepo = $horarioRepo;
        $this->materiaRepo = $materiaRepo;
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
        return $this->horarioRepo->store();
    }

    public function pdf($id)
    {
        $horas      = $this->horarioRepo->horas($id);
        $dias       = $this->horarioRepo->dias();
        $horario    = $this->horarioRepo->horario($id);
        $view        = view('horario.pdf', compact('horas', 'dias', 'horario'));
        $pdf        = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }

    public function destroy($id)
    {
        $this->horarioRepo->destroy($id);
        return redirect()->back()->withErrors(['errors' => 'Eliminado']);
    }
}
