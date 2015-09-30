@extends('layouts.pdf')

@section('style')
    {!! Html::style('css/main.css') !!}
@endsection

@section('content')
<article class="table-li">
    <div>Hora</div>
    @foreach($horas as $d)
        <div>{{$d->hora}}</div>
    @endforeach
</article>
@foreach($dias as $dia)
    <article class="table-li">
        <div>{{ $dia->dia }}</div>
        @foreach($horario as $d)
            @if($d->dia == $dia->dia)
                @if($d->materia == null)
                    <div>null</div>
                @else
                    <div>
                        {{ $d->materia }}
                    </div>
                @endif
            @endif
        @endforeach
    </article>
@endforeach

@endsection