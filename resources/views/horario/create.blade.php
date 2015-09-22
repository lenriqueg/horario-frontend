@extends('layouts.main')

@section('style')
    {!! Html::style('css/main.css') !!}
@endsection
@section('content')
<div class="row">
    <div class="col s4">
        {!! Form::open(['route' => ['horario.store', $id], 'method' => 'POST']) !!}
        <div class="input-field col s12">
            <select name="ciclo_id">
                <option value="{{ $ciclo->id }}">{{ $ciclo->ciclo }}</option>
            </select>
            <label for="hora_id">Horas disponibles</label>
        </div>
        <div class="input-field col s12">
            <select name="hora_id">
                <option value="" disabled selected>...</option>
                @foreach($horas as $h)
                    <option value="{{ $h->id }}">{{ $h->hora }}</option>
                @endforeach
            </select>
            <label for="hora_id">Horas disponibles</label>
        </div>
        <div class="input-field col s12">
            <select name="aula_id">
                <option value="" disabled selected>...</option>
                @foreach($aulas as $d)
                    <option value="{{ $d->id }}">{{ $d->aula }}</option>
                @endforeach
            </select>
            <label for="aula_id">Aulas disponibles</label>
        </div>
        <div class="input-field col s12">
            <select name="dia_id">
                <option value="" disabled selected>...</option>
                @foreach($dias as $d)
                    <option value="{{ $d->id }}">{{ $d->dia }}</option>
                @endforeach
            </select>
            <label for="dia_id">Dias disponibles</label>
        </div>
        <div class="input-field col s12">
            <select name="materia_id">
                <option value="" disabled selected>...</option>
                @foreach($materias as $d)
                    <option value="{{ $d->id }}">{{ $d->materia }}</option>
                @endforeach
            </select>
            <label for="materia_id">Materias disponibles</label>
        </div>
        <div class="input-field col s12 center-align">
            <button class="waves-effect waves-light btn white-text">Crear
                <i class="material-icons right">send</i>
            </button>
        </div>
        {!! Form::close() !!}
    </div>
    {{-- Tabla de horarios --}}
    <div class="col s8">
        <article class="table-li">
            <div data-col="inline">Hora</div>
            @foreach($horas as $d)
                <div data-col="inline">{{$d->hora}}</div>
            @endforeach
        </article>
        @foreach($dias as $dia)
        <article class="table-li">
            <div data-col="inline">{{ $dia->dia }}</div>
            @foreach($horario as $d)
                @if($d->dia == $dia->dia)
                    @if($d->materia == null)
                        <div data-col="inline">null</div>
                    @else
                        <div data-col="inline">{{ $d->materia }}</div>
                    @endif
                @endif
            @endforeach
        </article>
        @endforeach
        @include('partials.errors')
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection