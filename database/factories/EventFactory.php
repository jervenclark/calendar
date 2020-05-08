<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'from_date' => $faker->dateTimeBetween(
            $startDate = '-30 years',
            $endDate = '-10 years'
        ),
        'to_date' => $faker->dateTimeBetween(
            $startDate = '-10 years',
            $endDate = 'now'
        )
    ];
});
