<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\app\Cat;
use Faker\Generator as Faker;

$factory->define(App\Cat::class, function (Faker $faker) {
    return [
        'cat_item' => $faker->sentence,
    ];
});
