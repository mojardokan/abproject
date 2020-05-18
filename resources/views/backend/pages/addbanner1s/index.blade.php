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
                <a href ="#" class="btn btn-info mb-2">Addbanner1 Page</a>
              </li>
              <li class="nav-item p-3">
                <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
              </li>
              <li class="nav-item p-3">
                <a href="#addAddbanner1Modal" data-toggle="modal" class="btn btn-info mb-2">
                  <i class="fa fa-plus"></i> Add New Banner</a>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>

          <!-- Add Modal -->
          <div class="modal fade" id="addAddbanner1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Banner</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{!! route('admin.addbanner1.store')!!}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="title">Banner1 Title<small class="text-danger">(required)</small></label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Banner1 Title" required>
                    </div>

                    <div class="form-group">
                      <label for="image">Banner1 Image<small class="text-danger">(required)</small></label>
                      <input type="file" class="form-control" name="image" id="image" placeholder="Banner1 Image" required>
                    </div>

                    <div class="form-group">
                      <label for="button_text">Banner1 Button Text<small class="text-info">(optional)</small></label>
                      <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Banner1 Button Text (if need)">
                    </div>

                    <div class="form-group">
                      <label for="button_link">Banner1 Button Link<small class="text-info">(optional)</small></label>
                      <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Banner1 Button Link(if need)">
                    </div>

                    <div class="form-group">
                      <label for="priority">Banner1 Priority<small class="text-info">(required)</small></label>
                      <input type="number" class="form-control" name="priority" id="priority" placeholder="Banner1 Priority; e.g: 10" required>
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
            <th>Banner1 Title</th>
            <th>Banner1 Image</th>
            <th>Banner1 Priority</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
          <tr>
            @foreach($addbanner1s as $addbanner1)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$addbanner1->title}}</td>
                <td><img src="{{ asset('images/addbanner1s/'.$addbanner1->image) }}" width="40"></td>
                <td>{{$addbanner1->priority}}</td>

                <td>
                  <a href="#editModal{{ $addbanner1->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{$addbanner1->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $addbanner1->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('admin.addbanner1.delete', $addbanner1->id)!!}" method="post">
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
                    <div class="modal fade" id="editModal{{ $addbanner1->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Addbanner1</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.addbanner1.update', $addbanner1->id)!!}" method="post" enctype="multipart/form-data">
                              {{csrf_field() }}

                              <div class="form-group">
                                <label for="title">Banner1 Title<small class="text-danger">(required)</small></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Banner1 Title" required value="{{ $addbanner1->title}}">
                              </div>

                              <div class="form-group">
                                <label for="image">Banner1 Image<a href="{{ asset('images/addbanner1s/'.$addbanner1->image) }}" target="_blank">
                                    Previous Image
                                  </a>
                                  <small class="text-danger">(required)</small></label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Banner1 Image">
                              </div>

                              <div class="form-group">
                                <label for="button_text">Banner1 Button Text<small class="text-info">(optional)</small></label>
                                <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Banner1 Button Text (if need)" value="{{ $addbanner1->button_text}}">
                              </div>

                              <div class="form-group">
                                <label for="button_link">Banner1 Button Link<small class="text-info">(optional)</small></label>
                                <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Banner1 Button Link(if need)" value=" {{$addbanner1->button_link }}">
                              </div>

                              <div class="form-group">
                                <label for="priority">Banner1 Priority<small class="text-info">(required)</small></label>
                                <input type="number" class="form-control" name="priority" id="priority" placeholder="Banner1 Priority; e.g: 10" value="{{$addbanner1->priority }}">
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
              <th>Banner1 Title</th>
              <th>Banner1 Image</th>
              <th>Banner1 Priority</th>
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
