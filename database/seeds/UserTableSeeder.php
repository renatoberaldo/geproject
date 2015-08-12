<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GeProj\Entities\User::truncate();

        factory(\GeProj\Entities\User::class)->create([
            'name' => 'Renato Beraldo Nunes',
            'email' => 'renatoberaldo@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(\GeProj\Entities\User::class, 9)->create();
    }
}
