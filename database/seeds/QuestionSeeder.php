<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Question::class,200)->create();
    }
}
