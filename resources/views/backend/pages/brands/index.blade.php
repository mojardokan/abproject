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
                <a href ="#" class="btn btn-info mb-2">Brand Page</a>
              </li>
              <li class="nav-item p-3">
                <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
              </li>
              <li class="nav-item p-3">
                <a href="#addBrandModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                  <i class="fa fa-plus"></i> Add New Brand</a>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>

          <!-- Add Modal -->
          <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Brand</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{!! route('admin.brand.store')!!}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="name">Brand Name<small class="text-danger">(required)</small></label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Brand Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <textarea name="description" rows="8" cols="80" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="image">Brand Image(optional)</label>
                          <input type="file" class="form-control" name="image" id="image">
                    </div>

                    <button type="submit" class="btn btn-success">Add New</button>
                    <button type="button" class="btn btn-secondary" data-dismiss = "modal">Cancel</button>

                  </form>
                </div>
              </div>
            </div>
          </div>

        <table class="table table-hover table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Brand Name</th>
            <th>Brand Image</th>
            <th>Action</th>
          </tr>
          <thead>
          <tbody>
          <tr>
            @foreach($brands as $brand)
              <tr>
                <td>#</td>
                <td>{{$brand->name}}</td>
                <td>
                  <img src="{!!asset('images/brands/'.$brand->image)!!}" width="100">
                </td>
                <td>
                  <!-- <a href="{{route('admin.brand.edit', $brand->id)}}" class="btn btn-success">Edit</a> -->
                  <a href="#editModal{{ $brand->id }}" data-toggle="modal" class="btn btn-success">Edit</a>
                  <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.brand.delete', $brand->id)!!}" method="post">
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
                    <!-- Edit Modal -->
                  <div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.brand.update', $brand->id)!!}" method="post" enctype="multipart/form-data">
                            {{csrf_field() }}

                            <div class="form-group">
                              <label for="name">Brand Name<small class="text-danger">(required)</small></label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Brand Name" required value="{{$brand->name}}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Description(optional)</label>
                              <textarea name="description" rows="8" cols="80" class="form-control">{!!$brand->description!!}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="oldimage">Brand Old Image</label><br>

                                <img src="{!!asset('images/brands/'.$brand->image)!!}" width="100"><br>

                                <label for="image">Brand New Image(optional)</label>

                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss = "modal">Cancel</button>

                          </form>
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
              <th>Brand Name</th>
              <th>Brand Image</th>
              <th>Action</th>
            </tr>
          </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
