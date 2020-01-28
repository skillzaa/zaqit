<?php

use Illuminate\Database\Seeder;

class PaperitemSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Paperitem::class,100)->create();
    }
}
