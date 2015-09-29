<?php

get('/', ['as' => 'index', 'uses' => 'HorarioController@index']);

get('carreras', ['as' => 'carreras', 'uses' => 'HorarioController@carreras']);

get('carreras/{id}/grupos', ['as' => 'grupos', 'uses' => 'HorarioController@grupos']);

get('crear-horario-{id}', ['as' => 'horario.create', 'uses' => 'HorarioController@create']);

post('crear-horario-{id}', ['as' => 'horario.store', 'uses' => 'HorarioController@store']);

delete('elimiar-horario-{id}', ['as' => 'horario.destroy', 'uses' => 'HorarioController@destroy']);