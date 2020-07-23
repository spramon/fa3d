<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class visitasController extends Controller
{
  public function visitas(){
    $today = Carbon::now()->format('d/m/Y');
    $visitasUnicasHoy = Visita::where("fecha_visita",$today)->distinct('ip_visitante')->count('ip_visitante');
    $visitasTotalesHoy = Visita::where("fecha_visita",$today)->count();
    $visitasUnicasTotales = Visita::distinct('ip_visitante')->count('ip_visitante');
    $visitasTotales = Visita::all()->count();

    return view('visitas/visitas',compact('visitasUnicasHoy','visitasTotalesHoy','visitasUnicasTotales','visitasTotales'));
  }
  public function visitasAjax(Request $request){
    if($request->ajax()){
      $today = Carbon::now()->format('d/m/Y');
      $visitasUnicasHoy = Visita::where("fecha_visita",$today)->distinct('ip_visitante')->count('ip_visitante');
      $visitasTotalesHoy = Visita::where("fecha_visita",$today)->count();
      $visitasUnicasTotales = Visita::distinct('ip_visitante')->count('ip_visitante');
      $visitasTotales = Visita::all()->count();

      $visitas =[
        'visitasUnicasHoy' => $visitasUnicasHoy,
        'visitasTotalesHoy' => $visitasTotalesHoy,
        'visitasUnicasTotales' => $visitasUnicasTotales,
        'visitasTotales' => $visitasTotales
      ];

      return response()->json($visitas);
    }
  }
  public function nuevaVisita(Request $request){

    if($request->ajax()){
      $today = Carbon::now()->format('d/m/Y');
      $visita = new Visita;
      $visita->ip_visitante = $request->ip;
      $visita->fecha_visita = $today;
      $visita->save();
      return response()->json();
    }
  }
}
