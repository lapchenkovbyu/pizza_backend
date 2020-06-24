<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {
    return [
        'usd'=> 9.99,
        'eur'=> 8.99,
    ];
});

$factory->state(Price::class,'forMediumSize', [
    'usd'=> mt_rand(500,900)/100,
    'eur'=> mt_rand(500,900)/100
]);
$factory->state(Price::class,'forXLSize', [
    'usd'=> mt_rand(900,1500)/100,
    'eur'=> mt_rand(900,1500)/100
]);
