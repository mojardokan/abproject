<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
  public function images()
  {
    return $this->hasMany(CarouselImage::class);
  }
}
