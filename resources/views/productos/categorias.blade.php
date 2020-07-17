@extends('layouts.body_layout')
@section('css')
<link rel="stylesheet" href="/css/productos/edit.css">
@if(Auth::user() && Auth::user()->is_admin)
<script src="/js/productos/edit.js"></script>
@endif
@endsection
@section('container')
<section>
    <div class="modal fade" id="categoriasModal" tabindex="-1" role="dialog" aria-labelledby="categoriasModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoriasModal">Este producto pertenece a las categorias:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline:none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group categorias" style="margin-left:5%;">
                        <input type="checkbox" id="seleccionarTodo" class="form-check-input" name="seleccionarTodo" value=""><label class='form-check-label' for="seleccionarTodo">Seleccionar todas</label><br>
                        @foreach ($categorias as $categorias)
                        <input type="checkbox" class="form-check-input" name="{{$categorias->name}}" value="{{$categorias->id}}" id="{{$categorias->name}}"><label class='form-check-label' for="{{$categorias->name}}">{{$categorias->name}}</label><br>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Guardar cambios</button>
                </div>
                <input type="hidden" name="producto_id" value="">
            </div>
        </div>
    </div>
    @if(empty($productos[0]))
      <div style="min-height:60vh;padding-top:20vh;">
        <h2>Ups! No pudimos encontrar ese producto</h2>
        <br>
        <h2><i class="far fa-frown"></i></h2>
      </div>
    @else
    <h1>Productos @if (isset($busqueda)): {{$busqueda}}@endif</h1>
    @if (isset($categoria))
      <h2>{{$categoria->name}}</h2>
    @endif

    <div class="articles">
        @foreach ($productos as $producto)
        <input type="file" style="width:0px;height: 0px;overflow: hidden;" name="imagen">
        <article>

            <input type="hidden" name="producto_id" value="{{$producto->id}}">
            <img src="/storage/{{$producto["imagen-0"]}}" alt="{{$producto->nombre}} - {{$producto["descripcion-0"]}}">
            <div class="imgprecio"><img src="/img/precio.png" alt="precio">
            </div>
            <div class="article-hover">
                @if(Auth::user() && Auth::user()->is_admin)
                <button type="button" class="ver-categorias" data-toggle="modal" data-target="#categoriasModal" style="outline:none;">
                    Ver categorias
                </button>
                @endif
                <div class="nombre">{{$producto->nombre}}</div>
                <div class="descripciones" style="text-align:center;">
                    <input type="hidden" name="descripciones" value="{{$producto->descripciones}}">
                    @for ($i = 0; $i< $producto->descripciones ; $i++)
                        <div class="descripcion" name='{{$i}}'>{{$producto["descripcion-$i"]}}</div>
                        @if (!$producto["precio-$i"])
                        @else
                        <div class="precio" name='{{$i}}'>${{$producto["precio-$i"]}}</div>
                        @endif
                        @endfor
                </div>
                @if($producto->colores)
                  <button type="button" name="button" data-toggle="modal" data-target="#exampleModal" style="padding: 0 10px 0 10px;">VER COLORES</button>
                @endif
                @if(Auth::user() && Auth::user()->is_admin)
                <div class="agregar-descripcion">
                    <i class="fas fa-plus" style="color:#fff"></i>
                    <i class="fas fa-minus" style="color:#fff"></i>
                </div>

                <div class="icons">
                    <input type="hidden" name="destacado" value="{{$producto->destacado}}">
                    @if ($producto->destacado)
                    <i class="fas fa-heart" style="color:#Faf400"></i>
                    @else
                    <i class="far fa-heart" style="color:#Faf400"></i>
                    @endif
                    <i class="fas fa-image" style="color:#F5028a;"></i>
                    <i class="far fa-trash-alt" style="color:white;"></i>
                </div>
                @endif
            </div>
            <img style="display:none;" class="loading" src="/img/gifs/loading_icon.gif" alt="loading" />
        </article>
        @endforeach
    </div>
  @endif
</section>
@endsection
