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
                  <a href ="#" class="btn btn-info mb-2">Carousels Page</a>
                </li>
                <li class="nav-item p-3">
                  <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
                </li>
                <li class="nav-item p-3">
                  <a href="#addCarouselModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                    <i class="fa fa-plus"></i> Add New Carousel</a>
                </li>
              </ul>
            </div>
          <div class="clearfix"></div>

          <!-- Add Modal -->
          <div class="modal fade" id="addCarouselModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Carousel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{!! route('admin.carousel.store')!!}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="title">Carousel Title<small class="text-danger">(required)</small></label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Carousel Title" required>
                    </div>

                    <div class="form-group">
                      <label for="image">Carousel Image<small class="text-danger">(required Size:265x190)</small></label>
                      <input type="file" class="form-control" name="image" id="image" placeholder="Carousel Image" required>
                    </div>

                    <div class="form-group">
                      <label for="button_text">Carousel Button Text<small class="text-info">(optional)</small></label>
                      <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Carousel Button Text (if need)">
                    </div>

                    <div class="form-group">
                      <label for="button_link">Carousel Button Link<small class="text-info">(optional)</small></label>
                      <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Carousel Button Link(if need)">
                    </div>

                    <div class="form-group">
                      <label for="priority">Carousel Priority<small class="text-info">(required)</small></label>
                      <input type="number" class="form-control" name="priority" id="priority" placeholder="Carousel Priority; e.g: 10" required>
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
            <th>Carousel Title</th>
            <th>Carousel Image</th>
            <th>Carousel Priority</th>
            <th>Action</th>
          </tr>
        </thead>
          <tbody>
          <tr>
            @foreach($carousels as $carousel)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$carousel->title}}</td>
                <td><img src="{{ asset('images/carousels/'.$carousel->image) }}" width="40"></td>
                <td>{{$carousel->priority}}</td>

                <td>
                  <a href="#editModal{{ $carousel->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{$carousel->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $carousel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('admin.carousel.delete', $carousel->id)!!}" method="post">
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
                    <div class="modal fade" id="editModal{{ $carousel->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Carousel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.carousel.update', $carousel->id)!!}" method="post" enctype="multipart/form-data">
                              {{csrf_field() }}

                              <div class="form-group">
                                <label for="title">Carousel Title<small class="text-danger">(required)</small></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Carousel Title" required value="{{ $carousel->title}}">
                              </div>

                              <div class="form-group">
                                <label for="image">Carousel Image<a href="{{ asset('images/carousels/'.$carousel->image) }}" target="_blank">
                                    Previous Image
                                  </a>
                                  <small class="text-danger">(required)</small></label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Carousel Image">
                              </div>

                              <div class="form-group">
                                <label for="button_text">Carousel Button Text<small class="text-info">(optional)</small></label>
                                <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Carousel Button Text (if need)" value="{{ $carousel->button_text}}">
                              </div>

                              <div class="form-group">
                                <label for="button_link">Carousel Button Link<small class="text-info">(optional)</small></label>
                                <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Carousel Button Link(if need)" value=" {{$carousel->button_link }}">
                              </div>

                              <div class="form-group">
                                <label for="priority">Carousel Priority<small class="text-info">(required)</small></label>
                                <input type="number" class="form-control" name="priority" id="priority" placeholder="Carousel Priority; e.g: 10" value="{{$carousel->priority }}">
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
              <th>Carousel Title</th>
              <th>Carousel Image</th>
              <th>Carousel Priority</th>
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
