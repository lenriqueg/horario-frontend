@extends('layouts.main')
@section('style')
<style type="text/css">
    strong{
        text-transform: uppercase;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach($data as $d)
        <div class="col s4">
            <div class="card medium">
                <div class="card-image">
                    <img src="{{ asset('img/carrera.jpg') }}"/>
                </div>
                <div class="card-content">
                    <p class="text-uppercase center-align">
                        <strong>
                            {{ $d->carrera }}
                        </strong>
                    </p>
                </div>
                <div class="card-action">
                    <a class="waves-effect waves-light btn white-text" href="{{ route('grupos', $d->id) }}">Grupos
                        <i class="material-icons right">send</i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
