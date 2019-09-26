<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
         'name'   => $faker->city.' '.random_int(1,10),
         'banner' => $faker->imageUrl(),
    ];
});
