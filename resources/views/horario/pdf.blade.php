@extends('layouts.pdf')

@section('style')
    {!! Html::style('css/main.css') !!}
    <style>
        section:first-child{
            margin-bottom: 2em;
        }
        table:last-child{
            margin-top: 3em;
        }
    </style>
@endsection

@section('content')
<section>
    <table>
        <tr>
            <td width="200px">
                <img src="{{ asset('img/logo.jpeg') }}" class="img-float">
            </td>
            <td class="encabezado">
                <p>CENTRO DE BACHILLERATO TECNOLOGICO INDUSTRIAL Y DE SERVICIOS N° 251</p>
                <p>CICLO ESCOLAR {{ $ciclo->ciclo }}</p>
                @foreach($grupo as $d)
                    <p>GRUPO: {{ $d->grupo }} {{ $d->semestre }}</p>
                    <p>TURNO: {{ $d->turno }}</p>
                @endforeach
            </td>
        </tr>
    </table>
</section>

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
                            <p>{{ substr($ho->materia, 0, 19) }}</p>
                            <p>{{ $ho->aula }}</p>
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

<table class="table-pdf"">
    <tr>
        <th>Maestro</th>
        <th>Materia</th>
    </tr>
    @foreach($materias as $d)
        <tr class="border">
            <td class="border">{{ $d->nombres }}</td>
            <td class="border">{{ $d->materia }}</td>
        </tr>
    @endforeach
</table>
@endsection

@section('script')
    <script>
    </script>
@endsection