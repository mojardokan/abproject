<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Carousel;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Addbanner1;

class PagesController extends Controller
{
    public function index()
    {
      $sliders= Slider::orderby('priority', 'asc')->get();
      $banners= Banner::orderby('priority', 'asc')->get();
      $addbanner1s= Addbanner1::orderby('priority', 'asc')->get();
      $products= Product::orderby('id', 'desc')->paginate(8);
      return view ('frontend.pages.index',compact('products', 'sliders', 'banners', 'addbanner1s'));
    }

    public function carousel()
    {
      $carousels= Carousel::orderby('priority', 'asc')->get();
      $products= Product::orderby('id', 'desc');
      return view ('frontend.pages.carousel',compact('products', 'carousels'));
    }

    public function allcategory()
    {
      $carousels= Carousel::orderby('priority', 'asc')->get();
      return view ('frontend.pages.allcategory',compact('carousels'));
    }

    public function contact()
    {
      return view('frontend.pages.contact');
    }
    public function grocery()
    {
      return view('frontend.pages.grocery');
    }

    public function search(Request $request)
    {
      $search = $request->search;

      $products= Product::orwhere('title', 'like', '%'.$search.'%')
      ->orwhere('description', 'like', '%'.$search.'%')
      ->orwhere('slug', 'like', '%'.$search.'%')
      ->orwhere('price', 'like', '%'.$search.'%')
      ->orwhere('quantity', 'like', '%'.$search.'%')
      ->orderby('id', 'desc')
      ->paginate(9);
      return view ('frontend.pages.product.search', compact('search', 'products'));
    }

}
