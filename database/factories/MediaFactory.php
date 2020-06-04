<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Media;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    return [
        //
        'post_id' => $faker->numberBetween(1,200),
        'title' => $faker->randomElement(['Facebook post' ,'Tweet','Sound', 'Video']),
        'url' =>$faker->url,
    ];
});
