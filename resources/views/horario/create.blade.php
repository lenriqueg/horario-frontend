@extends('layouts.main')

@section('style')
    {!! Html::style('css/main.css') !!}
@endsection
@section('content')

<div class="row">
    @include('partials.form')
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
                        <div data-col="inline" style="background: {{ $d->color }}">
                            {{ $d->materia }}
                            {!! Form::open(['route' => ['horario.destroy', $id], 'class' => 'form-inline', 'method' => 'DELETE']) !!}
                            {!! Form::hidden('materia_id', $d->materia_id) !!}
                            {!! Form::hidden('hora_id', $d->hora_id) !!}
                            {!! Form::hidden('ciclo_id', $ciclo->id) !!}
                            {!! Form::hidden('dia_id', $d->dia_id) !!}
                            {!! Form::hidden('aula_id', $d->aula_id) !!}
                            <button type="submit" data-button="small">
                                <i class="material-icons right">error_outline</i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    @endif
                @endif
            @endforeach
        </article>
        @endforeach
        @include('partials.errors')
        <article>
            <a class="waves-effect waves-light btn" href="{{ route('horario.pdf', $id) }}">Pdf</a>
        </article>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.4.0/randomColor.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
@endsection