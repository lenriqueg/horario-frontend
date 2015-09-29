<div class="col s4">
    {!! Form::open(['route' => ['horario.store', $id], 'method' => 'POST']) !!}
    {!! Form::hidden('grupo_id', $id) !!}
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