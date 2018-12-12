<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Animal;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('products.index')->with('products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      $brands = Brand::all();
      $animals = Animal::all();

      return view('products.create')->with(compact('categories', 'brands', 'animals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
  			'name' => 'required | string | max: 150',
  			'price' => 'required | numeric | min:10 | max:999999.99',
        'brand_id' => 'required | integer',
  			'category_id' => 'required | integer',
        'animal_id' => 'required | integer',
        'description' => 'required | string | max:500',
        'image' => 'required | string'

  		], [
  			'required' => 'Este campo es obligatorio',
        'integer' => 'La opción elegida no es válida',
			  'name.max' => 'Máximo: 150 caracteres',
  			'price.numeric' => 'El campo precio solo admite números',
  			'price.min' => 'El precio mínimo es 10',
  			'price.max' => 'El precio máximo es 999999.99',
        'description.max' => 'Máximo: 500 caracteres',
  		]);

      $newProduct = Product::create($request->all());

      echo "<h1>Producto creado exitosamente</h1>";

      dd($newProduct);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function listCategoryById($id)
    {
      if ($category= Category::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();
        $productsCategory= Product::where('category_id', '=', $id)->paginate(10);
        return view('products.list.listByCategory')->with(compact('productsCategory','category'));
      }else {
        return('<h1>Categoria inexistente</h1>');
      }
    }

//--- listar productos por animal START here ----//

    public function listAnimalById($id)
    {
      if ($animal= Animal::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();
        $productsAnimal= Product::where('animal_id', '=', $id)->paginate(10);

        return view('products.list.listByAnimal')->with(compact('productsAnimal','animal'));
      }else {
        return('<h1>Animal inexistente</h1>');
      }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $product = Product::find($id);

      $categories = Category::all();
      $brands = Brand::all();
      $animals = Animal::all();

      return view('products.edit')->with(compact('product', 'categories', 'brands', 'animals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
  			'name' => 'required | string | max: 150',
  			'price' => 'required | numeric | min:10 | max:999999.99',
        'brand_id' => 'required | integer',
  			'category_id' => 'required | integer',
        'animal_id' => 'required | integer',
        'description' => 'required | string | max:500',
        'image' => 'required | string'

  		], [
  			'required' => 'Este campo es obligatorio',
        'integer' => 'La opción elegida no es válida',
			  'name.max' => 'Máximo: 150 caracteres',
  			'price.numeric' => 'El campo precio solo admite números',
  			'price.min' => 'El precio mínimo es 10',
  			'price.max' => 'El precio máximo es 999999.99',
        'description.max' => 'Máximo: 500 caracteres',
  		]);

      $product = Product::find($id);

  		$product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->brand_id = $request->input('brand_id');
      $product->category_id = $request->input('category_id');
      $product->animal_id = $request->input('animal_id');
      $product->description = $request->input('description');
      $product->image = $request->input('image');

  		$product->save();

      echo "<h1>Producto editado exitosamente</h1>";

      dd($product);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
