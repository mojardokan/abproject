@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('backend.partials.messages')
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter Product Name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control" required></textarea>

            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="number" class="form-control" name="price" id="exampleInputEmail1" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Quantity</label>
              <input type="number" class="form-control" name="quantity" id="exampleInputEmail1" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Select Category</label>
              <select class="form-control" name="category_id" required>
                <option value="">Please select a category for the product</option>
                @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
                  <option value="{{$parent->id}}">{{$parent->name}}</option>

                  @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',$parent->id)->get() as $child)
                    <option value="{{$child->id}}">------>{{$child->name}}</option>
                  @endforeach

                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Select Brand</label>
              <select class="form-control" name="brand_id" required>
                <option value="">Please select a brand for the product</option>
                @foreach (App\Models\Brand::orderby('name','asc')->get() as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="product_image">Product Image <small class="text-danger">(Add different style picture Size:225x225)</small> </label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" required>
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection