<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;
use Image;
use File;

class BannersController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
    public function index()
    {
      $banners= Banner::orderby('priority', 'asc')->get();
        return view ('backend.pages.banners.index', compact('banners'));
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
        'title.required' => 'Please provide a banner title',
        'priority.required' => 'Please provide banner priority',
        'image.required' => 'Please provide a valid image',
        'button_link.url' => 'Please provide a valid banner button link'
      ]);

      $banner = new Banner();
      $banner ->title = $request->title;
      $banner ->priority = $request->priority;
      $banner ->button_text = $request->button_text;
      $banner ->button_link = $request->button_link;
      if ($request->image > 0){
        $image=$request->file('image');
        $img =time(). '.'. $image->getClientOriginalExtension();
        $location ='images/banners/'.$img;
        Image::make($image)->save($location);
        $banner ->image = $img;
      }
      $banner->save();
      session()->flash('success', 'A new banner has added successfully !!');
      return redirect()->route('admin.banners');
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
        'title.required' => 'Please provide a banner title',
        'priority.required' => 'Please provide banner priority',
        'image.image' => 'Please provide a valid image',
        'button_link.url' => 'Please provide a valid banner button link'
      ]);

      $banner = Banner::find($id);
      $banner ->title = $request->title;
      $banner ->button_text = $request->button_text;
      $banner ->button_link = $request->button_link;
      $banner ->priority = $request->priority;
      if ($request->image > 0){
        //Delete the old banner
        if(File::exists('images/banners/'.$banner->image)){
          File::delete('images/banners/'.$banner->image);
        }
        $image=$request->file('image');
        $img =time(). '.'. $image->getClientOriginalExtension();
        $location = 'images/banners/'.$img;
        Image::make($image)->save($location);
        $banner ->image = $img;
      }
      $banner->save();
      session()->flash('success', 'Banner has updated successfully !!');
      return redirect()->route('admin.banners');
    }

    public function delete($id)
    {
      $banner = Banner::find($id);
      if (!is_null($banner)) {
        //Delete Image
        if(File::exists('images/banners/'.$banner->image)){
          File::delete('images/banners/'.$banner->image);
        }
        $banner->delete();
      }
        session()->flash('success', 'Banner has deleted successfully !!');
        return back();
    }

}
