<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'post_id' => factory(\App\Post::class),
        'user_id' => factory(\App\User::class)
    ];
});
