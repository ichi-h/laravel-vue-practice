<?php

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'task' => $faker->text(20),
        'is_done' => $faker->randomElement([true, false]),
    ];
});
