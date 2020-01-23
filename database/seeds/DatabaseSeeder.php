<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(SubjectSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}
