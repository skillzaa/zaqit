<?php
use Faker\Generator as Faker;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Question;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->paragraph,
        'option1'=>$faker->word,
        'option2'=>$faker->word,
        'option3'=>$faker->word,
        'option4'=>$faker->word,
        'correctOption'=>$faker->numberBetween(1,4),

        'explanation'=>$faker->paragraph,
        'notes'=>$faker->paragraph,

       'difficulty'=>$faker->randomElement($array = array ('easy','medium','hard')) ,

        'subject_id'=> function(){
            return Subject::all()->random();
        },
        'level_id'=> function(){
            return Level::all()->random();
        }

    ];
});
