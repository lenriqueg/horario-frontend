<?php

use App\Core\Entities\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'usuario'     => 'administrador',
        'password' => bcrypt('cbtis'),
        'remember_token' => str_random(10),
    ];
});
