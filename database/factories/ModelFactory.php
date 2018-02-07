<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Ticket::class, function (Faker\Generator $faker) {

  
  return [
    'nombre' => $faker->name,
    'descripcion' => $faker->text($maxNbChars = 100),
    'nivel_importancia' => $faker->randomElement([\App\Ticket::NIVEL_IMPORTANCIA_URGENTE,\App\Ticket::NIVEL_IMPORTANCIA_BAJO]),
    'fecha_solicitud' => $faker->dateTime($max = 'now', $timezone = null),
  ];
});
