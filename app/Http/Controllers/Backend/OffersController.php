<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Offer;
use Image;
use File;

class OffersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $offers = Offer::orderBy('id', 'desc')->get();
    return view('backend.pages.offers.index')->with('offers', $offers);
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
      'title.required' => 'Please provide a offer title',
      'priority.required' => 'Please provide offer priority',
      'image.required' => 'Please provide a valid image',
      'button_link.url' => 'Please provide a valid offer button link'
    ]);

    $offer = new Offer();
    $offer ->title = $request->title;
    $offer ->priority = $request->priority;
    $offer ->button_text = $request->button_text;
    $offer ->button_link = $request->button_link;
    if ($request->image > 0){
      $image=$request->file('image');
      $img =time(). '.'. $image->getClientOriginalExtension();
      $location ='images/offers/'.$img;
      Image::make($image)->save($location);
      $offer ->image = $img;
    }
    $offer->save();
    session()->flash('success', 'A new offer has added successfully !!');
    return redirect()->route('admin.offers');
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
      'title.required' => 'Please provide a offer title',
      'priority.required' => 'Please provide offer priority',
      'image.image' => 'Please provide a valid image',
      'button_link.url' => 'Please provide a valid offer button link'
    ]);

    $offer = Offer::find($id);
    $offer ->title = $request->title;
    $offer ->button_text = $request->button_text;
    $offer ->button_link = $request->button_link;
    $offer ->priority = $request->priority;
    if ($request->image > 0){
      //Delete the old slidwe
      if(File::exists('images/offers/'.$offer->image)){
        File::delete('images/offers/'.$offer->image);
      }
      $image=$request->file('image');
      $img =time(). '.'. $image->getClientOriginalExtension();
      $location = 'images/offers/'.$img;
      Image::make($image)->save($location);
      $offer ->image = $img;
    }
    $offer->save();
    session()->flash('success', 'Offer has updated successfully !!');
    return redirect()->route('admin.offers');
  }

  public function delete($id)
  {
    $offer = Offer::find($id);
    if (!is_null($offer)) {
      //Delete Image
      if(File::exists('images/offers/'.$offer->image)){
        File::delete('images/offers/'.$offer->image);
      }
      $offer->delete();
    }
      session()->flash('success', 'Offer has deleted successfully !!');
      return back();
  }

}
