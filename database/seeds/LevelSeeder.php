<?php
use Illuminate\Database\Seeder;
class LevelSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Level::class,4)->create();
    }
}
