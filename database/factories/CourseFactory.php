<?php

$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        "teachers_id" => factory('App\User')->create(),
        "title" => $faker->name,
        "slug" => $faker->name,
        "description" => $faker->name,
        "price" => $faker->randomNumber(2),
        "start_date" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "published" => 0,
    ];
});
