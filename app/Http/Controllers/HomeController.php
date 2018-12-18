<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    // private $productos = [
    //   "camas_mascotas" => ["titulo" => "Cama Para mascotas", "precio" => "", "imagen" => "/images/products/camas_mascotas.jpg"],
    //   "alimento_perros" => ["titulo" => "Alimento Balanceado", "precio" => "", "imagen" => "/images/products/alimento_perros.jpg"],
    //   "comedero" => ["titulo" => "Comedero para mascotas", "precio" => "", "imagen" => "/images/products/comedero.jpg"],
    //   "ropa_perros" => ["titulo" => "Ropa para Mascotas", "precio" => "", "imagen" => "/images/products/ropa_perros.jpg"],
    //   "arnes" => ["titulo" => "Arnés de Paseo", "precio" => "", "imagen" => "/images/products/arnes.jpg"],
    //   "cucha" => ["titulo" => "Cucha para Perros", "precio" => "", "imagen" => "/images/products/cucha.jpg"],
    //   "rascador_gatos" => ["titulo" => "Rascador para Gatos", "precio" => "", "imagen" => "/images/products/rascador_gatos.jpg"],
    //   "acuario" => ["titulo" => "Acuario para Peces", "precio" => "", "imagen" => "/images/products/acuario.jpeg"]
    // ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Product::where('active', '=', '1')->orderBy('price')->limit(8)->get();
        $recientes = Product::where('active', '=', '1')->orderBy('created_at', 'desc')->limit(8)->get();

        return view('home')->with(compact('ofertas', 'recientes'));
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
        //
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
