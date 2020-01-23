<?php
use Illuminate\Database\Seeder;
class LevelSeeder extends Seeder
{

    public function run()
    {
        factory(App\Models\Level::class,15)->create();
    }
}
