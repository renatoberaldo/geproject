<?php

use Illuminate\Database\Seeder;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GeProj\Entities\ProjectTask::truncate();
        factory(\GeProj\Entities\ProjectTask::class, 50)->create();
    }
}