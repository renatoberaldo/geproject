<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(GeProj\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(GeProj\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence()
    ];
});

$factory->define(\GeProj\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => $faker->numberBetween(1,6),   //sei que estou inserindo 6 users no UserTableSeeder.php
        'client_id' => $faker->numberBetween(1,10), //sei que estou inserindo 10 clientes no ClientTableSeeder.php
        'name' => $faker->word,
        'description'=> $faker->sentence(),
        'progress' => $faker->numberBetween(0,100),
        'status' => $faker->numberBetween(1,3), //Nao iniciado, iniciado e finalizado
        'due_date' => $from = $faker->dateTime
    ];
});

$factory->define(\GeProj\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => $faker->numberBetween(1,10),   //sei que estou inserindo 10 projects no ProjectTableSeeder.php
        'title' => $faker->word,
        'note'=> $faker->paragraph()
    ];
});

$factory->define(\GeProj\Entities\ProjectTask::class, function (Faker\Generator $faker) {
    return [
        'project_id' => $faker->numberBetween(1,10),   //sei que estou inserindo 10 projects no ProjectTableSeeder.php
        'name' => $faker->word,
        'start_date' => $from = $faker->dateTime,
        'due_date' => $faker->dateTime,
        'status' => $faker->numberBetween(1,3) //Nao iniciado, iniciado e finalizado
    ];
});

$factory->define(\GeProj\Entities\ProjectMember::class, function (Faker\Generator $faker) {
    return [
        'project_id' => $faker->numberBetween(1,10),   //sei que estou inserindo 10 projects no ProjectTableSeeder.php
        'member_id' => $faker->numberBetween(1,10),   //sei que estou inserindo 10 users no UserTableSeeder.php
    ];
});