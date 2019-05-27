<?php

use App\Module;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'division_id' => 1,
    ];
    
});