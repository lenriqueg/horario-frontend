<?php

get('/login', 'AuthController@index');

post('/login', ['as' => 'login', 'uses' => 'AuthController@login']);