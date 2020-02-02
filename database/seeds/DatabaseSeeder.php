<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(SubjectSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(DisplayHeadingSeeder::class);
        $this->call(UserSeeder::class);


    }
}
