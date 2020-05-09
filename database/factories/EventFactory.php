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
        ),
        'days' => join(
            ' ',
            $faker->randomElements(
                ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                $count = $faker->numberBetween(1, 7)
            )
        )
    ];
});
