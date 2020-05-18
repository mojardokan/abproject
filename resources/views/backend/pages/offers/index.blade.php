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
                  <a href ="#" class="btn btn-info mb-2">Offers Page</a>
                </li>
                <li class="nav-item p-3">
                  <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
                </li>
                <li class="nav-item p-3">
                  <a href="#addOfferModal" data-toggle="modal" class="btn btn-info float-right mb-2">
                    <i class="fa fa-plus"></i> Add New Offer</a>
                </li>
              </ul>
            </div>
          <div class="clearfix"></div>

          <!-- Add Modal -->
          <div class="modal fade" id="addOfferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Offer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{!! route('admin.offer.store')!!}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label for="title">Offer Title<small class="text-danger">(required)</small></label>
                      <input type="text" class="form-control" name="title" id="title" placeholder="Offer Title" required>
                    </div>
                    <div class="form-group">
                      <label for="image">Offer Image<small class="text-danger">(required)</small></label>
                      <input type="file" class="form-control" name="image" id="image" placeholder="Offer Image" required>
                    </div>
                    <div class="form-group">
                      <label for="button_text">Offer Button Text<small class="text-info">(optional)</small></label>
                      <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Offer Button Text (if need)">
                    </div>
                    <div class="form-group">
                      <label for="button_link">Offer Button Link<small class="text-info">(optional)</small></label>
                      <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Offer Button Link(if need)">
                    </div>
                    <div class="form-group">
                      <label for="priority">Offer Priority<small class="text-info">(required)</small></label>
                      <input type="number" class="form-control" name="priority" id="priority" placeholder="Offer Priority; e.g: 10" required>
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
            <th>Offer Title</th>
            <th>Offer Image</th>
            <th>Offer Priority</th>
            <th>Action</th>
          </tr>
          <thead>
          <tbody>
          <tr>
            @foreach($offers as $offer)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$offer->title}}</td>
                <td><img src="{{ asset('images/offers/'.$offer->image) }}" width="40"></td>
                <td>{{$offer->priority}}</td>

                <td>
                  <a href="#editModal{{ $offer->id }}" data-toggle="modal" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{$offer->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{!! route('admin.offer.delete', $offer->id)!!}" method="post">
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
                    <div class="modal fade" id="editModal{{ $offer->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Offer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.offer.update', $offer->id)!!}" method="post" enctype="multipart/form-data">
                              {{csrf_field() }}

                              <div class="form-group">
                                <label for="title">Offer Title<small class="text-danger">(required)</small></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Offer Title" required value="{{ $offer->title}}">
                              </div>

                              <div class="form-group">
                                <label for="image">Offer Image<a href="{{ asset('images/offers/'.$offer->image) }}" target="_blank">
                                    Previous Image
                                  </a>
                                  <small class="text-danger">(required)</small></label>
                                <input type="file" class="form-control" name="image" id="image" placeholder="Offer Image">
                              </div>

                              <div class="form-group">
                                <label for="button_text">Offer Button Text<small class="text-info">(optional)</small></label>
                                <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Offer Button Text (if need)" value="{{ $offer->button_text}}">
                              </div>

                              <div class="form-group">
                                <label for="button_link">Offer Button Link<small class="text-info">(optional)</small></label>
                                <input type="url" class="form-control" name="button_link" id="button_link" placeholder="Offer Button Link(if need)" value=" {{$offer->button_link }}">
                              </div>

                              <div class="form-group">
                                <label for="priority">Offer Priority<small class="text-info">(required)</small></label>
                                <input type="number" class="form-control" name="priority" id="priority" placeholder="Offer Priority; e.g: 10" value="{{$offer->priority }}">
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
              <th>Offer Title</th>
              <th>Offer Image</th>
              <th>Offer Priority</th>
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
