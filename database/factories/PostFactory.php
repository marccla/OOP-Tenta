<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\app\Post;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->sentence,
        'post_img' => $faker->url,
        'upvotes' => $faker->biasedNumberBetween(1, 10),
        'downvotes' => $faker->biasedNumberBetween(1, 10),
        'cat_id' => factory(\App\Cat::class),
        'user_id' => factory(\App\User::class)
    ];
});
