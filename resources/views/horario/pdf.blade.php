@extends('layouts.pdf')

@section('style')
    {!! Html::style('css/main.css') !!}
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
                        <td>
                            <p>{{ substr($ho->materia, 0, 19) }}...</p>
                            <p>{{ $ho->aula }}</p>
                        </td>
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

@section('script')
    <script>
    </script>
@endsection