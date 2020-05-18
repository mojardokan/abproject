<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Carousel;
use Image;
use File;


class CarouselsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index()
    {
      $carousels= Carousel::orderby('priority', 'asc')->get();
        return view ('backend.pages.carousels.index', compact('carousels'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'image' => 'required|image',
        'priority' => 'required',
        'button_link' => 'nullable|url'
      ],
      [
        'title.required' => 'Please provide a carousel title',
        'priority.required' => 'Please provide carousel priority',
        'image.required' => 'Please provide a valid image',
        'button_link.url' => 'Please provide a valid carousel button link'
      ]);

      $carousel = new Carousel();
      $carousel ->title = $request->title;
      $carousel ->priority = $request->priority;
      $carousel ->button_text = $request->button_text;
      $carousel ->button_link = $request->button_link;
      if ($request->image > 0){
        $image=$request->file('image');
        $img =time(). '.'. $image->getClientOriginalExtension();
        $location ='images/carousels/'.$img;
        Image::make($image)->save($location);
        $carousel ->image = $img;
      }
      $carousel->save();
      session()->flash('success', 'A new carousel has added successfully !!');
      return redirect()->route('admin.carousels');
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'title' => 'required',
        'image' => 'nullable|image',
        'priority' => 'required',
        'button_link' => 'nullable|url'
      ],
      [
        'title.required' => 'Please provide a carousel title',
        'priority.required' => 'Please provide carousel priority',
        'image.image' => 'Please provide a valid image',
        'button_link.url' => 'Please provide a valid carousel button link'
      ]);

      $carousel = Carousel::find($id);
      $carousel ->title = $request->title;
      $carousel ->button_text = $request->button_text;
      $carousel ->button_link = $request->button_link;
      $carousel ->priority = $request->priority;
      if ($request->image > 0){
        //Delete the old slidwe
        if(File::exists('images/carousels/'.$carousel->image)){
          File::delete('images/carousels/'.$carousel->image);
        }
        $image=$request->file('image');
        $img =time(). '.'. $image->getClientOriginalExtension();
        $location = 'images/carousels/'.$img;
        Image::make($image)->save($location);
        $carousel ->image = $img;
      }
      $carousel->save();
      session()->flash('success', 'Carousel has updated successfully !!');
      return redirect()->route('admin.carousels');
    }

    public function delete($id)
    {
      $carousel = Carousel::find($id);
      if (!is_null($carousel)) {
        //Delete Image
        if(File::exists('images/carousels/'.$carousel->image)){
          File::delete('images/carousels/'.$carousel->image);
        }
        $carousel->delete();
      }
        session()->flash('success', 'Carousel has deleted successfully !!');
        return back();
    }

}
