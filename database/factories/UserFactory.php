<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//
//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});

$cursos = ['Computer Science','Network Admin','Database designer']; //array de dados

$factory->define(\App\Models\Course::class, function (Faker $faker) use ($cursos) {
    return [

        'name' => $faker->unique()->randomElement($cursos),
        'course_content' => $faker->text(10),
        'departments_id' => $faker->numberBetween(1, \App\models\Department::all()->count()),


    ];
});

$department_names = ['Science','Health']; //array de dados
$factory->define(\App\Models\Department::class, function (Faker $faker) use ($department_names) {
    return [

        'name' => $faker->unique()->randomElement($department_names),


    ];
});

