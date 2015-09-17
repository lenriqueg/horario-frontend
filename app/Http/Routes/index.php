<?php

get('/', ['as' => 'index', 'uses' => 'HorarioController@index']);

get('carreras', ['as' => 'carreras', 'uses' => 'HorarioController@carreras']);

get('carreras/{id}/grupos', ['as' => 'grupos', 'uses' => 'HorarioController@grupos']);