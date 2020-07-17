<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargo extends Model
{
  public $table = "encargos";

  public $timestamps = false;

  public $guarded = [];
}
