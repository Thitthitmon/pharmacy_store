<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'name' => ('Miss Universe Myanmar'),
            'email' => ('mum2019@gmail.com'),
            'password' => bcrypt('mum2019@dmin'),
            'channel' =>('facebook'),
            'is_active' => ('0'),
        ]);
    }
}
