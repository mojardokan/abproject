<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addbanner1 extends Model
{
  public function images()
  {
    return $this->hasMany(Addbanner1Image::class);
  }
}
