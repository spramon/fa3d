<?php

namespace App\Http\Controllers;

use App\Mail\recibimosTuMensaje;
use App\Mail\tienesUnMensaje;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Mail;
use Illuminate\Support\Facades\Storage;

class contactoController extends Controller
{

    public function create(Request $request){

      $rulls = [
        "name" => "required",
        "email" => "required|email",
        "phone" => "required",
        "imagen"=> "file",
        "mensaje" => "required",
      ];
      $message= [
        'required' => 'Completa este campo',
        'email' => 'Debe ser un email',
        'imagen.file' => 'debe ser una imagen',
        'mensaje.required' => 'Ups! No nos has enviado nada :('
      ];
      $this->validate($request,$rulls,$message);
      if ($request->imagen) {
        $imagen='';
        $imagen = $request->file('imagen')->store('public');
        $imagen=basename($imagen);
        $request->imagen = $imagen;
      }
      $data=$request;
      \Mail::to('fa.impresion3d@gmail.com')->send(new tienesUnMensaje($data));
      \Mail::to($data->email)->send(new recibimosTuMensaje);

      return redirect('/');
    }
}
