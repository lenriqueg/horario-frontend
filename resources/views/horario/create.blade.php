@extends('layouts.main')

@section('style')
    {!! Html::style('css/main.css') !!}
    <style>
        table{
            width: 100%;
        }
        .custom{
            color: white;
            background: red;
            border-radius: 50%;
            padding: 0 5px;
        }
    </style>
@endsection
@section('content')

<div class="row">
    <div class="row center-align">
        <a href="{{route('carreras')}}" class="btn-floating btn-large waves-effect waves-light blue"><i class="material-icons">fast_rewind</i></a>
        <a class="waves-effect waves-light btn" href="{{ route('horario.pdf', $id) }}">Pdf</a>
    </div>
    @include('partials.form')
    {{-- Tabla de horarios --}}
    <div class="col s9">
        <table class="table-pdf">
            <thead>
            <tr>
                <th class="border">hora</th>
                @foreach($dias as $d)
                    <th class="border">{{ $d->dia }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
                @foreach($horas as $h)
                <tr>
                    <td class="border">{{ $h->hora }}</td>
                    @foreach($horario as $ho)
                        @if($h->hora == $ho->hora)
                            @if($ho->materia)
                                <td class="border" style="background: {{ $ho->color }}">
                                    <p>
                                        {{ substr($ho->materia, 0, 19) }}, <strong>{{ $ho->aula }}</strong>
                                            {!! Form::open(['route' => ['horario.destroy', $id], 'class' => 'form-inline', 'method' => 'DELETE']) !!}
                                            {!! Form::hidden('materia_id', $ho->materia_id) !!}
                                            {!! Form::hidden('hora_id', $ho->hora_id) !!}
                                            {!! Form::hidden('ciclo_id', $ciclo->id) !!}
                                            {!! Form::hidden('dia_id', $ho->dia_id) !!}
                                            {!! Form::hidden('aula_id', $ho->aula_id) !!}
                                            <button type="submit" data-button="small"><span class="custom">x</span></button>
                                            {!! Form::close() !!}
                                    </p>
                                </td>
                            @else
                                <td class="border"></td>
                            @endif
                        @endif
                    @endforeach
                </tr>
                @endforeach

            </tbody>
        </table>

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