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
                <a href ="#" class="btn btn-info mb-2">Front Banners Page</a>
              </li>
              <li class="nav-item p-3">
                <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
              </li>
              <li class="nav-item p-3">
                <a href="#addBannerModal" data-toggle="modal" class="btn btn-info mb-2">
                  <i class="fa fa-plus"></i> Add New Banner</a>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>

          <!-- Add Modal -->
          <div class="modal fade" id="addBannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{!! route('admin.banner.store')!!}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="title">Banner Title<small class="text-danger">(required)</small></label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Banner Title" required>
                    </div>

                    <div class="form-group">
                      <label for="image">Banner Image<small class="text-danger">(required)</small></label>
                      <input type="file" class="form-control" name="image" id="image" placeholder="Banner Image" required>
                    </div>

                    <div class="form-group">
                      <label for="button_text">Banner Button Text<small class="text-info">(optional)</small></label>
                      <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Banner Button Text (if need)">
                    </div>

                    <div class="form-group">
                      <label for="button_link">Banner Button Link<small class="text-info">(optional)</small></label>
                      <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Banner Button Link(if need)">
                    </div>

                    <div class="form-group">
                      <label for="priority">Banner Priority<small class="text-info">(required)</small></label>
                      <input type="number" class="form-control" name="priority" id="priority" placeholder="Banner Priority; e.g: 10" required>
                    </div>

                    <button type="submit" class="btn btn-success">Add New</button>
                    <button type="button" class="btn btn-secondary" data-dismiss = "modal">Cancel</button>

                  </form>

                </div>
              </div>
            </div>
          </div>

        <table class="table table-hover table-striped" id="dataTable">
          <thead>
          <tr>
            <th>#</th>
            <th>Banner Title</th>
            <th>Banner Image</th>
            <th>Banner Priority</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
          <tr>
            @foreach($banners as $banner)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$banner->title}}</td>
                <td><img src="{{ asset('images/banners/'.$banner->image) }}" width="40"></td>
                <td>{{$banner->priority}}</td>

                <td>
                  <a href="#editModal{{ $banner->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{$banner->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('admin.banner.delete', $banner->id)!!}" method="post">
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
                    <div class="modal fade" id="editModal{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.banner.update', $banner->id)!!}" method="post" enctype="multipart/form-data">
                              {{csrf_field() }}

                              <div class="form-group">
                                <label for="title">Banner Title<small class="text-danger">(required)</small></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Banner Title" required value="{{ $banner->title}}">
                              </div>

                              <div class="form-group">
                                <label for="image">Banner Image<a href="{{ asset('images/banners/'.$banner->image) }}" target="_blank">
                                    Previous Image
                                  </a>
                                  <small class="text-danger">(required)</small></label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Banner Image">
                              </div>

                              <div class="form-group">
                                <label for="button_text">Banner Button Text<small class="text-info">(optional)</small></label>
                                <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Banner Button Text (if need)" value="{{ $banner->button_text}}">
                              </div>

                              <div class="form-group">
                                <label for="button_link">Banner Button Link<small class="text-info">(optional)</small></label>
                                <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Banner Button Link(if need)" value=" {{$banner->button_link }}">
                              </div>

                              <div class="form-group">
                                <label for="priority">Banner Priority<small class="text-info">(required)</small></label>
                                <input type="number" class="form-control" name="priority" id="priority" placeholder="Banner Priority; e.g: 10" value="{{$banner->priority }}">
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
              <th>Banner Title</th>
              <th>Banner Image</th>
              <th>Banner Priority</th>
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
