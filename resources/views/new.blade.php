@extends('layouts.body_layout')
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('css')
<link rel="stylesheet" href="/css/productos/new.css">
<script src="/js/productos/new.js"></script>
@endsection
@section('container')
<section>
    <h1>NUEVO</h1>
    <br>
    <form method="POST" action="/productos/new" enctype="multipart/form-data">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <label for="categoria_id">Categoria: </label>
        <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id[]" id="categoria_id" multiple >
        <option value="" selected disabled>Elije la/las categoria/s</option>
        @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}" @if($categoria->id == old('categoria_id')) selected @endif>{{$categoria->name}}</option>
        @endforeach
        </select>
        @error('categoria_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <div class="form-group destacado_colores">
            <label for="destacado">Destacado:</label>
            <input type="checkbox" name="destacado" class="form-control @error('destacado') is-invalid @enderror" value="{{old('destacado')}}">
            @error('destacado')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="colores">Colores:</label>
            <input type="checkbox" name="colores" class="form-control @error('colores') is-invalid @enderror" value="{{old('colores')}}">
            @error('colores')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
        </div>
        <div class="form-group descripciones">
            <input type="hidden" name="descripciones" value="1">
            <div class="descripcion-0">
              <label for="precio-0">Precio:</label>
              <input type="number" class="form-control" name="precio-0" value="">
              <label for="descripcion-0" >Descripción:</label>
              <input type="text" class="form-control"name="descripcion-0" value="">
            </div>
        </div>
        <i class="fas fa-plus-circle" style="font-size:25px;color:#F5028a;"></i>
        <i class="fas fa-minus-circle" style="font-size:25px;color:#F5028a;"></i>
        <br>
        <label for="imagen">Imagen: </label>
        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
        @error('imagen')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <label for="keywords">Palabras-clave:</label>
        <textarea type="text" name="keywords" cols="50" rows="10" class="form-control @error('keywords') is-invalid @enderror" value="{{old('keywords')}}"></textarea>
        @error('keywords')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <br>
        <button type="submit" name="button" class="btn btn-success">GUARDAR</button>

    </form>
</section>
<br>
@endsection
@section('script')
  <script>
      window.onload = function() {
          var load = document.querySelector(".cargando");
          setTimeout(function() {
              load.style.visibility = "hidden";
              load.style.opacity = "0";
          }, 1500)

      };
  </script>
@endsection
