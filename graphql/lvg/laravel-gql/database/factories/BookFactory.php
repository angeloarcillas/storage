<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        //
        'title' => rtrim($faker->sentence(rand(3, 5)), "."),
        'author' => $faker->name,
        'description' => $faker->paragraph(rand(3, 7), true),
        'category_id' => App\Category::pluck('id')->random(),
    ];
});
