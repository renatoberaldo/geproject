<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \GeProj\Entities\ProjectNote::truncate();
        factory(\GeProj\Entities\ProjectNote::class, 50)->create();
    }
}
