@extends('layouts.body_layout')
@section('css')
<style >
  body{
    background:black;
    color:#fff;
}
</style>
@endsection
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')
<section>

    <h1></h1>
    <div class="texto">
        <h4>¿Cómo compro?</h4>
        <p>Elegis el producto que quieras y nos lo encargas.
            <br>Si es un producto <strong>personalizado</strong> se seña el 50% al encargarlo.
            <br>*Algunos productos hay stock y otros necesitan tiempo de preparación*</p>


        <h4>¿Dónde estamos ubicados?</h4>
        <p>Estamos en <strong>Ramos Mejía</strong> (La Matanza)
            <br>A 6 cuadras de la Trinidad Ramos Mejia
            <br><strong>IMPORTANTE</strong> NO es local, siempre se debe coordinar día y horario.</p>

        <h4>¿Cómo pago?</h4>
        <p>-En <strong>efectivo</strong> en el domicilio
            <br>-Por <strong>transferencia</strong> bancaria
            <br>-Con <strong>tarjeta</strong> de crédito o débito por Mercado pago con 10% de recargo.</p>

        <h4>¿Cómo recibo mi compra?</h4>
        <p>Podes <strong>retirar</strong> por el domicilio en Ramos Mejía (siempre se debe coordinar día y horario).
            <br>Hacemos <strong>envios</strong> a cargo del comprador por:
            <br>-Correo Argentino a todo el País (a tu domicilio o a la sucursal más cercana)
            <br>-Moto mensajería (GBA y Capital federal)</p>

        <h4>¿Qué transporte público me deja?</h4>
        <p>242(x larrea) (a una cuadra)
            <br>172 / 96 / 136 / 153 / 182 / 88 / 163 / 242 / 86 (En Rivadavia, a 5 cuadras)
            <br>Tren Sarmiento (Estación Ramos Mejía, 10 cuadras)</p>

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
