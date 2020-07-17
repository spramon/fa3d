<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>Nombre: {{$data['name']}}</p>
    <p>Email: {{$data['email']}}</p>
    <p>Telefono: {{$data['phone']}}</p>
    <p>Imagen:<img src="/storage/{{$data['imagen']}}" alt=""></p>
    <p>Mensaje:</p>
    {{$data['mensaje']}}
  </body>
</html>
