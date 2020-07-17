@extends('layouts.body_layout')

@section('container')
<section>
    <h1>Secciones</h1>
    <hr>
    <div class="secciones">
        <div class="seccion">
            <a href="/productos/mates"><img src="/img/mates.png" alt="seccion mates">
                <div class="seccion-hover">MATES</div>
            </a>
        </div>
        <div class="seccion">
            <a href="/productos/llaveros"><img src="/img/llaveros.png" alt="seccion llaveros">
                <div class="seccion-hover">LLAVEROS</div>
            </a>
        </div>
        <div class="seccion">
            <a href="/productos/hogar"><img src="/img/casa.png" alt="seccion hogar">
                <div class="seccion-hover">HOGAR</div>
            </a>
        </div>
        <div class="seccion">
            <a href="/productos/accesorios"><img src="/img/celular.png" alt="seccion accesorios">
                <div class="seccion-hover">ACCESORIOS</div>
            </a>
        </div>
        <div class="seccion">
            <a href="/productos/personajes"><img src="/img/wow.png" alt="seccion personajes">
                <div class="seccion-hover">PERSONAJES</div>
            </a>
        </div>
        <div class="seccion">
            <a href="/personalizados"><img src="/img/patitas.png" alt="seccion chapitas">
                <div class="seccion-hover">CHAPITAS</div>
            </a>
        </div>
    </div>
    <hr>
    <h1>Productos destacados</h1>
    <h2></h2>
      <div class="productosdestacados">

          @foreach ($productos as $producto)
          <article>
              <img src="/storage/{{$producto["imagen-0"]}}" alt="{{$producto->nombre}} - {{$producto["descripcion-0"]}}">
              <div class="imgprecio"><img src="/img/precio.png" alt="precio"></div>
              <div class="article-hover">
                  <div class="nombre">
                      {{$producto->nombre}}
                  </div>
                  @for ($i = 0; $i< $producto->descripciones ; $i++)
                      <div class="descripcion">
                          {{$producto["descripcion-$i"]}}
                      </div>
                      @if (!$producto["precio-$i"])
                      @else
                      <div class="precio" name='{{$i}}'>${{$producto["precio-$i"]}}</div>
                      @endif
                  @endfor
                  @if($producto->colores)
                    <button type="button" name="button" data-toggle="modal" data-target="#exampleModal" style="padding: 0 10px 0 10px;">VER COLORES</button>
                  @endif
              </div>
          </article>
          @endforeach

      </div>


</section>
@endsection
