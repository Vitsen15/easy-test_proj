<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $users = User::all();

    return [
        'user_id' => $users->random()->id,
        'text' => $faker->text()
    ];
});
