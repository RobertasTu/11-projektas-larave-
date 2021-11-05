<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'isbn' => $faker->numberBetween(100000000, 999999999),
        'pages' => $faker->numberBetween(111, 999),
        'about' => $faker->sentence(8),
        'author_id'=> rand(1,15)

    ];
});
