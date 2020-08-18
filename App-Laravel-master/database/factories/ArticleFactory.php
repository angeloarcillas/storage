<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        //
        'user_id' => \App\User::pluck('id')->random(),
        'title' => $faker->sentence(),
        'excerpt' => $faker->sentence(),
        'body' => $faker->paragraph()
    ];
});
