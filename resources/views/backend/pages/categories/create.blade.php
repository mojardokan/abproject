@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card-heard">
       Add Category
    </div>
    <div class="card">
      <div class="card-body">
        <form action="{{route('admin.category.store')}}" method="post" enctype='multipart/form-data'>
          @csrf
          @include('backend.partials.messages')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Parent Category(optional)</label>
            <select class="form-control" name ="parent_id">
              <option value="">Please select a parent category</option>
              @foreach ($main_catrgories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="image">Category Image(optional)</label>
                <input type="file" class="form-control" name="image" id="image">
          </div>

          <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
      </div>
    </div>

  </div>
</div>

@endsection
