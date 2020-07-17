<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Producto;
use App\Imagen;
use App\Descripcion;
use App\Categoria;
use App\Cliente;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productosDestacados = Producto::where("destacado","=",true)->get();

        foreach ($productosDestacados as $productosDestacado) {
        $imagenes = Imagen::where("producto_id","=",$productosDestacado["id"])->get();
        for ($i=0; $i < count($imagenes) ; $i++) {
        $productosDestacado["imagen-$i"]= $imagenes[$i]["storage"];
        }
        $descripciones = Descripcion::where("producto_id","=",$productosDestacado["id"])->get();
        for ($i=0; $i < count($descripciones); $i++) {
        $productosDestacado["descripcion-$i"]=$descripciones[$i]["descripcion"];
        $productosDestacado["precio-$i"]=$descripciones[$i]["precio"];
        $productosDestacado["descripciones"]=$i+1;
        }
        }
        $clientes= Cliente::all();
        return view('index',compact("productosDestacados","clientes"));
    }

    public function home(){
    return view('home');
    }
    public function logout(){
      \Auth::logout();
      return redirect('/login');
    }
}
