@extends('layouts.body_layout')
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')
<section>
    <h1>Productos</h1>
    <h2>Personalizados</h2>

    <div class="articles">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">COLORES</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="../img/colores.jpg" alt="colores">
                        <div class="descripcion">
                            Todos los producto que tengan la opción <strong>VER COLORES</strong> se puede elegir el color a elección.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <article>
            <img src="../img/spotifyllavero.jpg" alt="llavero spotify cancion">
            <div class="imgprecio"><img src="../img/precio.png" alt="precio"></div>
            <div class="article-hover">
                <div class="nombre">
                    SPOTIFY
                </div>
                <div class="descripcion">
                    Regalá una canción
                </div>
                <div class="precio">
                    $150
                </div>
            </div>
        </article>

        <article>
            <img src="../img/sanvalentin.jpg" alt="rompecabezas llavero">
            <div class="imgprecio"><img src="../img/precio.png" alt="precio"></div>
            <div class="article-hover">
                <div class="nombre">
                    ROMPECABEZAS
                </div>
                <div class="descripcion">
                    Con fechas personalizadas
                </div>
                <div class="precio">
                    El par $250
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">VER COLORES</button>
            </div>
        </article>

    </div>

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
