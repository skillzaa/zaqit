<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DisplayHeading;
use Faker\Generator as Faker;

$factory->define(DisplayHeading::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->firstName
    ];
});
