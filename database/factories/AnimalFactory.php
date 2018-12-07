<?php

use Faker\Generator as Faker;

$factory->define(App\Animal::class, function (Faker $faker) {
	return [
		'name' => $faker->randomElement([  //va sin unique
			'Perros',
			'Gatos',
			'Peces',
      'Roedores',
			'Otros',
		]),
	];
});
