@extends('layouts.body_layout')
@section('css')
<link rel="stylesheet" href="/css/productos/edit.css">
<script src="/js/productos/edit.js"></script>
@endsection
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')

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
                    @foreach ($categorias as $categoria)
                    <input type="checkbox" class="form-check-input" name="{{$categoria->name}}" value="{{$categoria->id}}" id="{{$categoria->name}}"><label class='form-check-label' for="{{$categoria->name}}">{{$categoria->name}}</label><br>
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
<section>
    <form class="" id="edit-form" action="" method="post" style="display:none;" enctype="multipart/form-data">

    </form>
    <h1>EDICIÓN</h1>
    <div class="articles">


        @foreach ($productos as $producto)
        <input type="file" style="width:0px;height: 0px;overflow: hidden;" name="imagen">
        <article>
            <input type="hidden" name="producto_id" value="{{$producto->id}}">
            <img src="/storage/{{$producto["imagen-0"]}}" alt="{{$producto->nombre}} - {{$producto["descripcion-0"]}}">
            <div class="imgprecio"><img src="/img/precio.png" alt="precio">
            </div>
            <div class="article-hover">
                <button type="button" class="ver-categorias" data-toggle="modal" data-target="#categoriasModal" style="outline:none;">
                    Ver categorias
                </button>
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
            </div>
            <img style="display:none;" class="loading" src="/img/gifs/loading_icon.gif" alt="loading" />
        </article>
        @endforeach
        <div class="paginate" style="margin:0 auto;">
            {{$productos->links()}}
        </div>
        </div>
</section>

@endsection
