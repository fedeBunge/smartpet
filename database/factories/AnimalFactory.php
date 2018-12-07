<?php

use Faker\Generator as Faker;

$factory->define(App\Animal::class, function (Faker $faker) {
	return [
		'name' => $faker->randomElement([
			'Perros',
			'Gatos',
			'Peces',
      'Roedores',
			'Otros',
		]),
	];
});
