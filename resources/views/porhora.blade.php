@extends('layouts.body_layout')
@section('gif')
    <div class="cargando" style="background-color:rgba(0,0,0,0.5)">
        <img src="/img/gifs/loading_icon.gif" alt="gif-carga" style="width:10vh;">
    </div>
@endsection
@section('container')
<section>
    <h1>Servicios</h1>
    <h2>Impresión por hora</h2>
    <div class="texto">
        <p><br>Ofrecemos el servicio de impresión para aquellos que deseen imprimir algún proyecto personal o algún archivo que tengan ya armado.
            <br></p>
        <p><strong>Material: </strong>Filamentos <strong>PLA</strong> (plástico)</p>
        <p><strong>Espacio de impresión: </strong> Es de 18cmx18cmx25cm (piezas de hasta ese tamaño)</p>
        <p> <strong>Formato de archivo: </strong> .STL / .OBJ</p>

        <h4>Cotización</h4>

        <p>Para la cotización de la pieza, nos debe enviar al correo <strong><a href="mailto:fa.impresion3d@gmail.com">fa.impresion3d@gmail.com</a></strong> la siguiente información:
            <br>
            <strong>-El archivo con la pieza en alguno de estos formatos .STL / .OBJ</strong>
            <br> <strong>-Tamaño</strong>
            <br> <strong>-Calidad:</strong>

            <br>Resolución Alta – 0.10mm

            <br>Resolución Media – 0.20mm

            <br>Resolución Baja – 0.30mm
            <br> <strong>-Relleno: </strong>
            <br>0% - 10 % - 20% - 30% - 40% - 50% - 60% - 70% - 80% - 90% - 100%
            <br><br> Para más información o alguna consulta, <a href="/contacto">contactanos</a>!</p>

</section>
@endsection
