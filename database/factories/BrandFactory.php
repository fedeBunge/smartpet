<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
	return [
		'name' => $faker->randomElement([
    'Dogui',
    'ProPlan',
    'RoyalCanin',
    'Sabrositos',
    'DogChow',
    'Tiernitos',
    'Congo',
    'Pedigree',
    'NaturalCanin',
    'Nutrience'
		]),
	];
});
