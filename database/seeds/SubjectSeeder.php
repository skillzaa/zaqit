<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Subject::class,4)->create();
    }
}
