<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Huy Duy',
            'username' => 'pnhuyduy',
            'email' => 'pnhd@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Duy',
            'username' => 'hd',
            'email' => 'hd@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
    }
}
