<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paperitem;
use App\Models\Paper;
use Faker\Generator as Faker;

$factory->define(Paperitem::class, function (Faker $faker) {
    return [
        'subject'=>'1',
        'level'=>'1',
        'difficulty'=>$faker->randomElement($array = array ('easy','medium','hard')) ,

        'paper_id'=> function(){
            return Paper::all()->random();
        }
    ];
});
