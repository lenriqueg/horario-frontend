@extends('layouts.main')

@section('content')
    <div class="row">
        <article class="col sm5 offset-s4">
            <div class="card-panel teal">
                <section class="white-text center-align">
                    <p>Ciclo Escolar</p>
                    <p>{{ $data->ciclo }}</p>
                    <p>Si el ciclo es correcto por favor proceda con los horarios</p>
                </section>
            </div>
            <a class="waves-effect waves-light btn" href="{{ route('carreras') }}">
                Continuar
            </a>
        </article>
    </div>
@endsection