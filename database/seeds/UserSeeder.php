<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
    factory(App\User::class,150)->create();
    }
}
