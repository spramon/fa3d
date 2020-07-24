<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
  public $table = "visitas";

  public $timestamps = false;

  public $guarded = [];
}
