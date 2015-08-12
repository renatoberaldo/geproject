<?php

use Illuminate\Database\Seeder;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GeProj\Entities\ProjectMember::truncate();
        factory(\GeProj\Entities\ProjectMember::class, 50)->create();
    }
}
