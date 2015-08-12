<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GeProj\Entities\Project::truncate();
        factory(\GeProj\Entities\Project::class, 10)->create();
    }
}
