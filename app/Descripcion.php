<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
  public $table = "descripciones";

  public $timestamps = false;

  public $guarded = [];
}
