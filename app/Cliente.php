<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  public $table = "stories";

  public $timestamps = false;

  public $guarded = [];
}
