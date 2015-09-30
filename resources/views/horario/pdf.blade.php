@extends('layouts.pdf')

@section('style')
    {!! Html::style('css/main.css') !!}
    <style>
        body{
            font-family: sans-serif;
        }
        table{
            width: 100%;S
        }
    </style>
@endsection

@section('content')
<table>
    <thead>
    <tr>
        <th>hora</th>
        @foreach($dias as $d)
            <th>{{ $d->dia }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
        @foreach($horas as $h)
        <tr>
            <td>{{ $h->hora }}</td>
            @foreach($horario as $ho)
                @if($h->hora == $ho->hora)
                    @if($ho->materia)
                        <td>{{ $ho->materia }} {{ $ho->aula }}</td>
                    @else
                        <td>null</td>
                    @endif
                @endif
            @endforeach
        </tr>
        @endforeach

    </tbody>
</table>
@endsection