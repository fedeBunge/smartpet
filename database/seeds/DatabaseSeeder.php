<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      DB::table('animals')->insert([
    			['name'=>'Perros'],
          ['name'=>'Gatos'],
          ['name'=>'Peces'],
    			['name'=>'Roedores'],
          ['name'=>'Otros'],
    	]);

         DB::table('categories')->insert([
    			['name'=>'Alimentos'],
          ['name'=>'Juguetes'],
          ['name'=>'Vestimentas'],
    			['name'=>'Otros'],
    		]);

        factory(App\User::class)->times(150)->create();

        $products = factory(App\Product::class)->times(50)->create();
        $brands = factory(App\Brand::class)->times(10)->create();
        $categories = \App\Category::all();
        $animals = \App\Animal::all();

        foreach ($products as $oneProduct) {
          $oneProduct->brand()->associate($brands->random(1)->first()->id);
          $oneProduct->category()->associate($categories->random(1)->first()->id);
          $oneProduct->animal()->associate($animals->random(1)->first()->id);
          $oneProduct->save();

      }
    }
}
