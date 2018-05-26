<?php

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'username' => $faker->email,
        'password' => $password ?: $password = bcrypt('password'),
    ];
});
