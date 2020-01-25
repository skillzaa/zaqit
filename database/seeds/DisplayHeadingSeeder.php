<?php

use Illuminate\Database\Seeder;

class DisplayHeadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\DisplayHeading::class,15)->create();
    }
}
