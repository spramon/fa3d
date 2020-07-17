@extends('layouts.body_layout')
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')
<section>
    <h1>Contactanos</h1>
    <div class="contacto">
        <img src="../img/faLogo1-04.png" alt="logo">
        <form action="/contacto" method="post" enctype="multipart/form-data">
            @csrf
            <input class="input" type="text" name="name" value="{{old('name')}}" placeholder="Nombre">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <input class="input" type="email" name="email" value="{{old('email')}}" placeholder="Correo electrónico">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <input class="input" type="tel" name="phone" value="{{old('phone')}}" placeholder="Celular 011 15...">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <textarea name="mensaje" rows="8" cols="80" placeholder="Mensaje">{{old('mensaje')}}</textarea>
            @error('mensaje')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <input class="formulario-seleccionar" type="file" name="imagen" value="{{old('imagen')}}">
            @error('imagen')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <button type="submit" name="enviar">ENVIAR</button>

        </form>
    </div>
    <div class="datos">
        <li><img src="../img/mail.png" alt="">fa.impresion3d@gmail.com</li>
        <li>
            <div class="logos">
                <img src="../img/facebook.png" alt=""><img src="../img/instagram.png" alt="">
            </div>
            @fa.impresion3d</li>
    </div>
</section>
@endsection
