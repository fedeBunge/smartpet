<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	return [
		'name' => $faker->name,
    'description' => $faker->text($maxNbChars = 200),
		'price' => $faker->randomFloat(2, 100, 999999),
		'image' => $faker->imageUrl(320, 240, 'cats'), // lorempixel.com
		'active' => $faker->numberBetween(1, 1),
 	];
});
