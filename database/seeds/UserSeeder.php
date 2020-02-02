<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{

    public function run()
    {

    DB::table('users')->insert([
        'name' => "Bilal Tariq",
        'email' => 'admin@msn.com',
        'password' => '$2y$10$uFX94w1civmK6Xhyge5.mO.J1GSgm6Tv6l8OAKOaGRklV3o0PKswu', // password
        'role' => 'admin',
        'enabled'=>1,
        'subject_id'=> "1"
    ]);

    }
}
