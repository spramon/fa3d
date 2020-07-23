<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
  public $table = "productos";

  public $timestamps = false;

  public $guarded = [];
}
