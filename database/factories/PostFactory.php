<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $users = User::all();

    return [
        'user_id' => $users->random()->id,
        'text' => $faker->text()
    ];
});
