<?php

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'todo_order' => $faker->numerify('#,#,#,#'),
    ];
});
