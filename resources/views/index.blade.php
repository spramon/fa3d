@extends('layouts.body_layout')
@section('gif')
    <div class="cargando">
        <img src="/img/gifdecarga.gif" alt="gif-carga" >
    </div>
@endsection
@section('container')
<section>
    <!-- modo oscuro
    <div class="custom-control custom-switch">
      <input type="checkbox" class="custom-control-input" id="customSwitch1">
      <label class="custom-control-label" for="customSwitch1">Dark mode</label>
    </div>-->
    <div class="carouselnotebook">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/mates.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/chapitas.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/matesylapiceros.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="carouselphone">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/banner1-mobile.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/banner2-mobile.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/banner3-mobile.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
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
    <h4>Productos destacados</h4>
    <div class="productosdestacados">

        @foreach ($productosDestacados as $producto)
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
    <hr>
    <h4>Nos eligieron...</h4>
    <br>
    <div class="clientes">

        <a class="vermasclientes" href="/clientes">
          <p>VER MÁS</p>
          <img src="/img/clienteicono.png" alt="clientes">
        </a>
        <div class="bannerclientes">
        </div>
    </div>
</section>
@endsection
@section('script')
  <script>
      window.onload = function() {
          var load = document.querySelector(".cargando");
          setTimeout(function() {
              load.style.visibility = "hidden";
              load.style.opacity = "0";
          }, 3200)

      };
      var clientesindex = document.querySelector('.clientes');
      for (var i = 1; i <= 17; i++) {
      var vermasclientes = document.querySelector('.vermasclientes');
      var imgclientes = document.createElement('img');
      imgclientes.setAttribute('src','/img/clientes/clientes'+i+'.jpg');
      clientesindex.insertBefore(imgclientes, vermasclientes);
      }
  </script>
@endsection
