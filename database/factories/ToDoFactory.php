<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

//we need to input model class name which is typing 'Model'
$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence(3),
        'description'=>$faker->paragraph(4),
        'completed'=>false
    ];
});
