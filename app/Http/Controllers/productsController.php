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

    public function categoryById($id)
    {
      if ($category= Category::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();
        $productsCategory= Product::where('category_id', '=', $id);
        $productsElements= $productsCategory->count();
        $takeItems= 10;
        $takeItems <= $productsElements ?? $takeItems = $productsElements;

        if ($productsElements % $takeItems > 0) {
          $pages= intdiv( $productsElements,$takeItems)+1;
        }else {
          $pages =$productsElements / $takeItems;
        }


        $productsCategory=$productsCategory->skip(0)->take($takeItems)->get();
        $pageIndex=1;

        return view('products.list.listByCategory')->with(compact('productsCategory','category', 'pages','pageIndex' ));
      }else {
        return('<h1>Categoria inexistente</h1>');
      }
    }

    public function pagesCategory($id, $page){

      if ($category= Category::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();
        $productsCategory= Product::where('category_id', '=', $id);
        $productsElements= $productsCategory->count();
        $takeItems= 10;
        $takeItems <= $productsElements ?? $takeItems = $productsElements;

        if ($productsElements % $takeItems > 0) {
         $pages= intdiv( $productsElements,$takeItems)+1;
        }else {
         $pages =$productsElements / $takeItems;
        }
        if (($page)<=$pages) {

          if (($page)==$pages) {
            $take=$productsElements % $takeItems;
            if (!$take) {
              $take=$takeItems;
            }
            $skip=($page-1) * $takeItems;
          }else {

            $take=$takeItems;
            $skip=($page-1) * $takeItems;
          }
        }else {
          $take=$takeItems;
          $skip=0;
        }

       $productsCategory= $productsCategory->skip($skip)->take($take)->get();
       $pageIndex=$page;

       return view('products.list.listByCategory')->with(compact('productsCategory','category', 'pages', 'pageIndex'));
      }else {
        return('<h1>Categoria inexistente</h1>');
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
        //
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
        //
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
