<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Product;
use App\Models\Carousel;


class CategoriesController extends Controller
{

    public function index()
    {
        //
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
          return view('frontend.pages.categories.show', compact('category'));
        }else {
          session()->flash('errors', 'Sorry !! There is no category by this ID');
          return redirect('/');
        }
    }
    public function showcategory($id)
    {
      $carousels= Carousel::orderby('priority', 'asc')->get();
      $category = Category::find($id)
      ->where('parent_id', $id)
      ->orwhere('id', $id)
      ->get();

      if (!is_null($category)) {
        return view('frontend.pages.categories.showcategory', compact('category', 'carousels'));
      }else {
        session()->flash('errors', 'Sorry !! There is no category by this ID');
        return redirect('/');
      }
    }
}
