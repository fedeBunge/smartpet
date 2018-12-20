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

        DB::table('users')->insert([
            ['name'=>'Gabriel Hocsman',
            'nickname'=>'Gabriel',
            'country'=>'Argentina',
            'email'=>'gabrielhocsman@gmail.com',
            'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'admin'=>1,
            ],
            ['name'=>'Federico Bunge',
            'nickname'=>'fedebunge',
            'country'=>'Argentina',
            'email'=>'fbunge@bungesa.com.ar',
            'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'admin'=>1,
            ],
            ['name'=>'Leandro Agustín Vilanova',
            'nickname'=>'Agus-Vila',
            'country'=>'Argentina',
            'email'=>'luguergus.lv@gmail.com',
            'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'admin'=>1,
            ],
            ['name'=>'Santiago Bouso',
            'nickname'=>'esmowin',
            'country'=>'Argentina',
            'email'=>'santiagobouso@hotmail.com',
            'password'=>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'admin'=>1,
            ]
      	]);

        factory(App\User::class)->times(46)->create();

        $products = factory(App\Product::class)->times(300)->create();
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
