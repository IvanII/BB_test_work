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
            'name' => 'phirames',
            'email' => 'phirames@yandex.ru',
            'password' => bcrypt('secret'),
        ]);    }
}
