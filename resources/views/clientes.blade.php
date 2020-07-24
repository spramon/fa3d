@extends('layouts.body_layout')
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')
<section>
  <h1>Nos eligieron...</h1>
  <br>
  <div class="clientestodos">

  </div>
  <div class="bannerclientes">
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
          }, 1500)

      };
  </script>
@endsection
