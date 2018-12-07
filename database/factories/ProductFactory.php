<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
    'description' => $faker->name,
		'price' => $faker->randomFloat(2, 100, 99999999),
		'image' => $faker->imageUrl(320, 240, 'cats'), // lorempixel.com
 	];
});
