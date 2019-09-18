<?php

use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\Category;

$factory->define(Product::class, function (Faker $faker) {
    return [

        'category_id' => Category::all()->random()->id,
        'title'       => $faker->text(25),
        'description' => $faker->realText(),
        'price'       => random_int(180,1000)
    ];
});
