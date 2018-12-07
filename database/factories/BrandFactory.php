<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
	return [
		'name' => $faker->unique()->randomElement([
			'Dogui',
			'ProPlan',
			'RoyalCanin',
			'Sabrositos',
			'Dog Chow',
			'Tiernitos',
			'Congo',
			'Pedigree',
			'NuralCan',
			'Nutrience'
		]),
	];
});
