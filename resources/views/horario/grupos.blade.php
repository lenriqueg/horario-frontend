@extends('layouts.main')

@section('content')
<div class="row">
    @foreach($data as $d)
        <div class="col s4">
            <div class="card medium">
                <div class="card-image">
                    <img src="{{ asset('img/grupo.jpg') }}"/>
                </div>
                <div class="card-content center-align">
                    <p class="text-uppercase ">
                        <strong>
                            Grupo: {{ $d->grupo }}
                        </strong>
                    </p>
                    <p>Turno: {{ $d->turno }}</p>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn white-text">Grupos
                        <i class="material-icons right">send</i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection