@extends('layouts.main')
@section('style')
<style>
    .upper{
        text-transform: uppercase;
    }
    .custom{
        position: absolute;
        left: 80px;    
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
    @if(!$data)
        <p>SIn info</p>
    @else
        <a href="{{route('carreras')}}" class="btn-floating btn-large waves-effect waves-light blue custom"><i class="material-icons">fast_rewind</i></a>
        <h4>Matutino</h4>
        @foreach($data as $d)
            @if($d->turno == 'matutino')
            <div class="col s4">
                <div class="card medium">
                    <div class="card-image">
                        <img src="{{ asset('img/grupo.jpg') }}"/>
                        <span class="card-title blue-grey darken-2">
                                Grupo: {{ $d->grupo }}
                        </span>
                    </div>
                    <div class="card-content center-align">
                        <p>Turno: <span class="upper">{{ $d->turno }}</span></p>
                        <strong class="upper">{{ $d->semestre }}</strong>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn white-text" href="{{ route('horario.create', $d->id)}}">Crear Horario
                            <i class="material-icons right">send</i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        <h4>Vespertino</h4>
        @foreach($data as $d)
            @if($d->turno == 'vespertino')
            <div class="col s4">
                <div class="card medium">
                    <div class="card-image">
                        <img src="{{ asset('img/grupo.jpg') }}"/>
                        <span class="card-title blue-grey darken-2">
                                Grupo: {{ $d->grupo }}
                        </span>
                    </div>
                    <div class="card-content center-align">
                        <p>Turno: <span class="upper">{{ $d->turno }}</span></p>
                        <strong class="upper">{{ $d->semestre }}</strong>
                    </div>
                    <div class="card-action">
                        <a class="waves-effect waves-light btn white-text" href="{{ route('horario.create', $d->id)}}">Crear Horario
                            <i class="material-icons right">send</i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    @endif
    </div>
</div>
@endsection