<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use App\Imagen;
use App\Descripcion;
use App\Producto_categoria;

class busquedaController extends Controller
{
  public function buscador($id){

    $productos = Producto::where("keywords","like","%$id%")->get();
    foreach ($productos as $producto) {
    $imagenes = Imagen::where("producto_id","=",$producto["id"])->get();
    for ($i=0; $i < count($imagenes) ; $i++) {
    $producto["imagen-$i"]= $imagenes[$i]["storage"];
    }
    $descripciones = Descripcion::where("producto_id","=",$producto["id"])->get();
    for ($i=0; $i < count($descripciones); $i++) {
    $producto["descripcion-$i"]=$descripciones[$i]["descripcion"];
    $producto["precio-$i"]=$descripciones[$i]["precio"];
    $producto["descripciones"]=$i+1;
    }
    }
    $categorias = Categoria::all();
    $busqueda = $id;

    return view ('productos/categorias',compact('productos','categorias','busqueda'));
  }


}
