<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use App\Category;
use App\Brand;
use App\Animal;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cookie;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('products.index')->with('product', 'categories', 'brands', 'animals');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      if (!Auth::user()->admin) {
        return redirect('/');
      }

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
    public function store(CreateProductRequest $request)
    {

      $product = new Product;

      self::saveProductValues($request, $product);

      return redirect('/products/'.$product->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::find($id);

      if (!$product || !$product->active) {
        return redirect('/');
      }

      return view('products.list.listDetail')->with(compact('product'));

    }

    public function listCategoryById($id)
    {
      if ($category= Category::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();

        $productsCategory= Product::where('category_id', '=', $id)->paginate(10);
        //Cookie::queue('cookie2','valor2',60);

        $productsCategory= Product::where('category_id', '=', $id)->where('active', '=', '1')->paginate(10);

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
        $productsAnimal= Product::where('animal_id', '=', $id)->where('active', '=', '1')->paginate(10);

        return view('products.list.listByAnimal')->with(compact('productsAnimal','animal'));
      }else {
        return('<h1>Animal inexistente</h1>');
      }
    }

    public function findProduct(Request $request){

      $find = $request->input('search');
      $prodructsFind = Product::where('name', 'like', '%'. $find .'%')->where('active', '=', '1')->paginate(10);
      return view('products.list.listFindProduct')->with(compact('prodructsFind','find'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      if (!Auth::user()->admin) {
        return redirect('/');
      }

      $product = Product::find($id);

      if (!$product || !$product->active) {
        return redirect('/');
      }

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
    public function update(EditProductRequest $request, $id)
    {
      $product = Product::find($id);

      self::saveProductValues($request, $product);

      return redirect('/products/'.$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);
      $product->active = '0';
      $product->save();
      return redirect('/');
    }

    public function saveProductValues($request, $product)
    {
      $product->name = $request->input('name');
      $product->price = $request->input('price');
      $product->brand_id = $request->input('brand_id');
      $product->category_id = $request->input('category_id');
      $product->animal_id = $request->input('animal_id');
      $product->description = $request->input('description');

      if ($request->file('image') || $request->file('changeImage')) {
        if ($request->file('image')) {
          $image = $request->file('image');
        } else if ($request->file('changeImage')) {
          $image = $request->file('changeImage');
        }
        $fileName = uniqid('product_') . "." . $image->extension();
        $image->storePubliclyAs('public/products', $fileName);
        $product->image = $fileName;
      }

      $product->save();
    }

    public function __construct()
    {
      if (Auth::check()) {

        $this->middleware('auth');

      } else {

      }

    }

  public function carritoDeCompras(){

    //$cookie=Request::cookie('carrito');
     //$cookie=Cookie::get('cookie2');

     $products=[];
     if (isset($_COOKIE['carrito'])) {
       $cookie=   json_decode($_COOKIE['carrito']);
       foreach ($cookie->productos as $key=>$value) {
        // var_dump($value);
        array_push($products, Product::find($value));
      }
     }

   return view('products.carrito')->with(compact('products'));

  }

}
