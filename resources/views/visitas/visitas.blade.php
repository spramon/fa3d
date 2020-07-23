@extends('layouts.body_layout')
@section('css')
<style>
    body {
        background: black;
        color: #fff;
    }
</style>
@endsection
@section('gif')
<div class="cargando" style="background-color:rgba(0,0,0,0.5)">
    <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
</div>
@endsection
@section('container')
<input type="hidden" id="visitas" name="visitas" value="">
<section>
    <br>
    <h2>VISITANTES ÚNICOS HOY</h2>
    <h2 id="visitasUnicasHoy">{{$visitasUnicasHoy}}</h2>
    <br>
    <h2>VISITAS TOTALES HOY</h2>
    <h2 id="visitasTotalesHoy">{{$visitasTotalesHoy}}</h2>
    <br>
    <h2>VISITANTES ÚNICOS TOTALES</h2>
    <h2 id="visitasUnicasTotales">{{$visitasUnicasTotales}}</h2>
    <br>
    <h2>VISITAS TOTALES</h2>
    <h2 id="visitasTotales">{{$visitasTotales}}</h2>
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
<script src="/js/visitas/visitas.js"></script>
@endsection
