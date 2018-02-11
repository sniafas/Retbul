<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Dataset::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'buildingid' => $faker->numberBetween($min = 1, $max = 60),
        'experiment' => $faker->numberBetween($min = 0, $max = 1),
      
    ];
});

$factory->define(App\UserDataset::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'buildingid' => $faker->numberBetween($min = 1, $max = 60),
        'experiment' => $faker->numberBetween($min = 0, $max = 1),
      
    ];
});