<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Addbanner1;
use Image;
use File;

class Addbanner1sController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index()
    {
      $addbanner1s= Addbanner1::orderby('priority', 'asc')->get();
        return view ('backend.pages.addbanner1s.index', compact('addbanner1s'));
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
        'title.required' => 'Please provide a Banner title',
        'priority.required' => 'Please provide Banner priority',
        'image.required' => 'Please provide a valid image',
        'button_link.url' => 'Please provide a valid Banner button link'
      ]);

      $addbanner1 = new Addbanner1();
      $addbanner1 ->title = $request->title;
      $addbanner1 ->priority = $request->priority;
      $addbanner1 ->button_text = $request->button_text;
      $addbanner1 ->button_link = $request->button_link;
      if ($request->image > 0){
        $image=$request->file('image');
        $img =time(). '.'. $image->getClientOriginalExtension();
        $location ='images/addbanner1s/'.$img;
        Image::make($image)->save($location);
        $addbanner1 ->image = $img;
      }
      $addbanner1->save();
      session()->flash('success', 'A new Banner has added successfully !!');
      return redirect()->route('admin.addbanner1s');
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
        'title.required' => 'Please provide a Banner title',
        'priority.required' => 'Please provide Banner priority',
        'image.image' => 'Please provide a valid image',
        'button_link.url' => 'Please provide a valid Banner button link'
      ]);

      $addbanner1 = Addbanner1::find($id);
      $addbanner1 ->title = $request->title;
      $addbanner1 ->button_text = $request->button_text;
      $addbanner1 ->button_link = $request->button_link;
      $addbanner1 ->priority = $request->priority;
      if ($request->image > 0){
        //Delete the old slidwe
        if(File::exists('images/addbanner1s/'.$addbanner1->image)){
          File::delete('images/addbanner1s/'.$addbanner1->image);
        }
        $image=$request->file('image');
        $img =time(). '.'. $image->getClientOriginalExtension();
        $location = 'images/addbanner1s/'.$img;
        Image::make($image)->save($location);
        $addbanner1 ->image = $img;
      }
      $addbanner1->save();
      session()->flash('success', 'Banner has updated successfully !!');
      return redirect()->route('admin.addbanner1s');
    }

    public function delete($id)
    {
      $addbanner1 = Addbanner1::find($id);
      if (!is_null($addbanner1)) {
        //Delete Image
        if(File::exists('images/addbanner1s/'.$addbanner1->image)){
          File::delete('images/addbanner1s/'.$addbanner1->image);
        }
        $addbanner1->delete();
      }
        session()->flash('success', 'Banner has deleted successfully !!');
        return back();
    }

}
