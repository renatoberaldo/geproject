<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GeProj\Entities\Client::truncate();
        factory(\GeProj\Entities\Client::class, 10)->create();
    }
}
