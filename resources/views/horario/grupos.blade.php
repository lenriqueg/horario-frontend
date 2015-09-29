@extends('layouts.main')

@section('content')
<div class="row">
    @if(!$data)
    <p>SIn info</p>
    @else
    @foreach($data as $d)
        <div class="col s4">
            <div class="card medium">
                <div class="card-image">
                    <img src="{{ asset('img/grupo.jpg') }}"/>
                    <span class="card-title blue-grey darken-2">
                            Grupo: {{ $d->grupo }}
                    </span>
                </div>
                <div class="card-content center-align">
                    <p class="text-uppercase ">

                    </p>
                    <p>Turno: {{ $d->turno }}</p>
                    <strong>{{ $d->semestre }}</strong>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn white-text" href="{{ route('horario.create', $d->id)}}">Crear Horario
                        <i class="material-icons right">send</i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    @endif
</div>
@endsection