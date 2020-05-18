@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        @include('backend.partials.messages')
        <div class="">
          <ul class="nav">
            <li class="nav-item p-3">
              <span class="badge badge-warning"><h5>Category Page</h5></span>
            </li>
            <li class="nav-item p-3">
              <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
            </li>
            <li class="nav-item p-3">
              <a href ="{{route('admin.category.create')}}" class="btn btn-info mb-2">Add New Category</a>
            </li>
          </ul>
        </div>
        <table class="table table-hover table-striped" id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Category Image</th>
              <th>Parent Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
              <tr>
                <td>#</td>
                <td>{{$category->name}}</td>
                <td>
                  <img src="{!!asset('images/categories/'.$category->image)!!}" width="50">
                </td>
                <td>
                  @if ($category->parent_id==NULL)
                  Primary Category
                  @else
                  {{$category->parent->name}}
                  @endif
                </td>
                <td>
                  <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.category.delete', $category->id)!!}" method="post">
                              {{csrf_field() }}
                              <button type="submit" class="btn btn-danger">Permanent Delete</button>
                            </form>

                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
              </tr>

            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Category Image</th>
              <th>Parent Category</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

  </div>
</div>

@endsection
