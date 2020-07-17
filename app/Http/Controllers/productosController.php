<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Categoria;
use App\Producto;
use App\Imagen;
use App\Descripcion;
use App\Producto_categoria;



class productosController extends Controller
{
    public function show(){
      $productos = Producto::where("destacado",1)->get();

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
      return view('productos',compact("productos"));
    }
    public function new(){
      $categorias = Categoria::all();
      return view('new', compact('categorias'));

    }
    public function add(Request $request){

      $rulls = [
        "name" => "required|string",
        "categoria_id" => "required",
        "imagen"=> "required|file",
        "keywords" => "required|string"
      ];
      $message= [
        'required' => 'Completa este campo',
        'categoria_id.required'=>'Elije una categoria',
        'keywords.required' => 'Agrega por lo menos una keyword',
        'imagen.required' => 'Agrega una imagen',
        'imagen.file' => 'debe ser una imagen'
      ];
      $this->validate($request, $rulls, $message);

    $newProduct = new Producto;
    $imagen='';
    $imagen = $request->file('imagen')->store('public');
    $imagen=basename($imagen);


    $newProduct->nombre=$request["name"];
    $newProduct->keywords=$request["keywords"];
    if (isset($request["colores"])) {
      $newProduct->colores=1;
    }
    if (isset($request["destacado"])) {
      $newProduct->destacado=1;
    }
// guardo la imagen del producto
    $newProduct->save();
    $imagenFile = new Imagen;
    $imagenFile->producto_id = $newProduct->id;
    $imagenFile->storage = $imagen;
    $imagenFile->save();
// guardo la descripcion del producto
    for ($i=0; $i < $request["descripciones"]; $i++) {
      $descripcion = new Descripcion;
      $descripcion->precio = $request["precio-$i"];
      $descripcion->descripcion = $request["descripcion-$i"];
      $descripcion->producto_id = $newProduct->id;
      $descripcion->save();
    }

// relaciono el producto con la categoria
    for ($i=0; $i < count($request["categoria_id"]); $i++) {
      $producto_categoria = new Producto_categoria;
      $producto_categoria->producto_id = $newProduct->id;
      $producto_categoria->categoria_id = $request["categoria_id"][$i];
      $producto_categoria->save();
    }

// redirijo al inicio
    return redirect('/productos/edit');
    }

    public function categoria($id){
      $id=trim($id);
      $categoria= Categoria::where("name","=",$id)->first();

      $producto_categoria= Producto_categoria::where("categoria_id","=",$categoria->id)->get();
      $productos = [];
      for ($i=0; $i < count($producto_categoria); $i++) {
      $productos[]= Producto::find($producto_categoria[$i]["producto_id"]);
      }

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
      return view("productos/categorias", compact('categoria','productos','categorias'));
    }

    public function edit(){
      $productos= Producto::paginate(15);
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
      return view ('productos/all',compact('productos','categorias'));
    }

    public function categoriaProducto(Request $request, $id){
      if ($request->ajax()) {
      $producto_categoria = Producto_categoria::where('producto_id',$id)->get();
      $categorias=[];

      $allCategorias = Categoria::all();
      foreach ($producto_categoria as $producto_categoria_id) {
      foreach ($allCategorias as $categoria) {
        if ($categoria->id == $producto_categoria_id->categoria_id) {
        $categorias[]= $categoria;
          }
        }
      }
        return response()->json($categorias);
      }
    }
    public function editarCategoria(Request $request,$id){
      $productos_categoria = Producto_categoria::where('producto_id',$id)->get();
      foreach ($productos_categoria as $producto_categoria) {
        $producto_categoria->delete();
      }
      if ($request->ajax()) {
        for ($i=0; $i < count($request['categorias']); $i++) {
          $nuevasCategorias = new Producto_categoria;
          $nuevasCategorias->categoria_id=$request['categorias'][$i];
          $nuevasCategorias->producto_id= $id;
          $nuevasCategorias->save();
        }
        return response()->json();
      }
    }
    public function agregarDescripcion(Request $request, $id){
      if ($request->ajax()) {
        $nuevaDescripcion = new Descripcion;
        $nuevaDescripcion->descripcion=$request['descripcion'];
        $nuevaDescripcion->precio=$request['precio'];
        $nuevaDescripcion->producto_id=$id;
        $nuevaDescripcion->save();

        return response()->json($nuevaDescripcion);
      }
    }
    public function eliminarDescripcion(Request $request, $id){
      if($request->ajax()){
        $descripcion = Descripcion::where('producto_id',$id)->where('descripcion',$request['descripcion'])->first();
        $descripcion->delete();
        return response()->json();
      }
    }
    public function destacado(Request $request,$id){
      if($request->ajax()){
        $producto = Producto::find($id);
        if ($producto->destacado == 1) {
          $producto->destacado= 0;
        } else {
          $producto->destacado=1;
        }
        $producto->save();
        return response()->json($producto);
      }
    }

    public function imagen(Request $request, $id){
      $rulls = [
        "file"=> "required|file",
      ];
      $message= [
        'required' => 'necesito un campo'
      ];
      $this->validate($request, $rulls, $message);
      $imagenFile=$request->file('file')->store('public');
      $imagenFile=basename($imagenFile);
      $imagen = Imagen::where('producto_id',"=",$id)->first();
      if ($request->ajax()) {
        if ($imagen) {
          Storage::delete($imagen->storage);
          $imagen->storage = $imagenFile;
          $imagen->save();
        } else {
          $imagen = new Imagen;
          $imagen->storage= $imagenFile;
          $imagen->producto_id=$id;
          $imagen->save();
        }

        return response()->json($imagen);
      }
    }

    public function nombre(Request $request, $id){

      $producto = Producto::find($id);
      if ($request->ajax()) {
        $producto->nombre = $request['nombre'];
        $producto->save();
        return response()->json($producto);
      }
    }

    public function descripcion(Request $request, $id){
      $pos = $request["posicion"];
      if ($request->ajax()) {
      $descripciones = Descripcion::where("producto_id","=",$id)->get();

      $descripcion = Descripcion::find($descripciones[$pos]["id"]);
      $descripcion->descripcion = $request["descripcion"];
      $descripcion->save();
      return response()->json($descripcion);
      }
    }

    public function precio(Request $request, $id){
      $pos = $request["posicion"];
      if ($request->ajax()) {
      $precios = Descripcion::where("producto_id","=",$id)->get();

      $precio = Descripcion::find($precios[$pos]["id"]);
      $precio->precio = $request["precio"];
      $precio->save();
      return response()->json($precio);
      }
    }
    public function delete(Request $request,$id){
      $producto = Producto::find($id);
      if($request->ajax()){
        $descripciones = Descripcion::where("producto_id",$id)->get();
        foreach ($descripciones as $descripcion) {
          $descripcion->delete();
        }
        $imagen = Imagen::where("producto_id",$id)->first();
        Storage::delete($imagen->storage);
        $imagen->delete();
        $productos_categorias = Producto_categoria::where("producto_id",$id)->get();
        foreach ($productos_categorias as $producto_categoria) {
        $producto_categoria->delete();
        }
        $producto->delete();
        return response()->json();
      }
    }
}
