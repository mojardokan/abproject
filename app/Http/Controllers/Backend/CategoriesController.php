<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  public function index()
  {
    $categories = Category::orderBy('id', 'desc')->get();
    return view ('backend.pages.categories.index', compact('categories'));
  }
  public function create()
  {
      $main_catrgories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
      return view('backend.pages.categories.create', compact('main_catrgories'));
  }
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'image' => 'nullable|image'
    ],
    [
      'name.required' => 'Please provide a category name',
      'image.image' => 'Please provide a valid image with .jpg, .png, .gif, jpeg extension. ...'
    ]
  );
    $category = new Category();
    $category ->name = $request->name;
    $category ->description = $request->description;
    $category ->parent_id = $request->parent_id;
    //Insert Image also
        if ($request->image > 0){
          $image=$request->file('image');
          $img =time(). '.'. $image->getClientOriginalExtension();
          $location = 'images/categories/' .$img;
          Image::make($image)->save($location);
          $category ->image = $img;
        }

    $category->save();
    session()->flash('success', 'A new category has added successfully !!');
    return redirect()->route('admin.categories');
  }

  public function edit($id)
  {
      $main_catrgories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
      $category = Category::find($id);
      if(!is_null($category)){
        return view ('backend.pages.categories.edit', compact('category', 'main_catrgories'));
      }
      else {
        return redirect('admin.category');
      }
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'image' => 'nullable|image'
    ],
    [
      'name.required' => 'Please provide a category name',
      'image.image' => 'Please provide a valid image with .jpg, .png, .gif, jpeg extension. ...'
    ]
  );
    $category = Category::find($id);
    $category ->name = $request->name;
    $category ->description = $request->description;
    $category ->parent_id = $request->parent_id;
    //Insert Image also
        if ($request->image){
          //Delete oldimage from folder

          if (File::exists('images/categories/' .$category->image)) {
            File::delete('images/categories/' .$category->image);
          }
          $image=$request->file('image');
          $img =time(). '.'. $image->getClientOriginalExtension();
          $location = 'images/categories/' .$img;
          Image::make($image)->save($location);
          $category ->image = $img;
      }

    $category->save();
    session()->flash('success', 'Category has update successfully !!');
    return redirect()->route('admin.categories');
  }

  public function delete($id)
  {
    $category = Category::find($id);
    if (!is_null($category)) {
      //If it is parent category, then delete all it's sub category
      if ($category->parent_id==NULL) {
        //Delete sub categories
        $sub_catrgories = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

        foreach ($sub_catrgories as $sub) {
          if (File::exists('images/categories/' .$sub->image)) {
            File::delete('images/categories/' .$sub->image);
          }
          $sub->delete();
        }
      }

      //Delete category image
      if (File::exists('images/categories/' .$category->image)) {
        File::delete('images/categories/' .$category->image);
      }
      $category->delete();

    }
      session()->flash('success', 'Category has deleted successfully !!');
      return back();
  }

}
