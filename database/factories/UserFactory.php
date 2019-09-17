<?php

use Faker\Generator as Faker;


$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
       
        'name'        => $faker->name('male'),
        'email'       => $faker->email,
        'phone_number'=> $faker->phoneNumber,
        'password'    => Hash::make('secret'),
        'email_verified_at' =>Carbon::now(),
    ];
});
