@extends('layouts.body_layout')
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')
<section>
    <h1>Servicios</h1>
    <br>

    <div class="servicios">
        <div class="personalizados">
            <div class="personalizadosdetalle">
                <h4>PRODUCTOS PERSONALIZADOS</h4>
                <p>Tu logo, tu nombre, tu marca, en productos personalizados. Además podés encontrar chapitas para mascotas, y más.</p>
                <a href="/personalizados" class="btn btn-dark">VER</a>
            </div>
            <img src="/img/personalizados.jpg" alt="impresorasbyn">
        </div>
        <div class="porhora">
            <img src="/img/impresorasfondobyn.jpg" alt="impresorasbyn">
            <div class="porhoradetalle">
                <h4>IMPRESIÓN POR HORA</h4>
                <p>Ofrecemos el servicio de impresión para aquellos que deseen imprimir algún proyecto personal o algún archivo que tengan ya armado.</p>
                <a href="/porhora" class="btn btn-dark">VER</a>
            </div>

        </div>


        <br>
        <br>

</section>
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
