<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      if ($category= Category::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();
      $productsCategory= Product::where('category_id', '=', $id)->skip(0)->take(7)->get();
      $pages = (Product::where('category_id', '=', $id)->count())/5;
      return view('list.listByCategory')->with(compact('productsCategory','category', 'pages'));
      }else {
        return('<h1>Categoria inexistente</h1>');
      }
    }

    public function pagesCategory($id, $page)
    {
      if ($category= Category::find($id)) {
        //$productsCategory=  DB::table('products')->where('category_id','=',$id)->skip(0)->take(5)->get();
      $productsCategory= Product::where('category_id', '=', $id);
      $productsElements= $productsCategory->count();
       if ($productsElements%7 > 0) {
         $pages= intdiv( $productsElements,7)+1;
       }else {
         $pages =$productsElements / 7;
       }
      if (($page+1)<=$pages) {

        if (($page+1)==$pages) {
          $take=$productsElements % 7;
          $skip=($page)*7;
        }else {

          $take=7;
          $skip=$page*7;
        }
      }else {
        $take=7;
        $skip=0;

      }
      //var_dump($skip." ".$take." ".$pages);

       $productsCategory= $productsCategory->skip($skip)->take($take)->get();
       //var_dump($productsCategory);
       return view('list.listByCategory')->with(compact('productsCategory','category', 'pages'));
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
