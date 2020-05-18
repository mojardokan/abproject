<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Carousel;

class CarouselsController extends Controller
{
  public function index()
  {
      $carousels = Carousel::orderBy('id', 'asc')->paginate(4);
      return view('frontend.pages.carousel.index')->with('carousels', $carousels);
  }
  public function show($slug)
  {

  }
}
