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
              <a href ="#" class="btn btn-info mb-2">Division Page</a>
            </li>
            <li class="nav-item p-3">
              <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
            </li>
            <li class="nav-item p-3">
              <a href="#addDivisionModal" data-toggle="modal" class="btn btn-info mb-2">
                <i class="fa fa-plus"></i> Add New Division</a>
            </li>
          </ul>
        </div>
        <div class="clearfix"></div>

        <!-- Add Modal -->
        <div class="modal fade" id="addDivisionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Division</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{!! route('admin.division.store')!!}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter Division Name" required>
                  </div>
                  <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="text" class="form-control" name="priority" id="priority"  placeholder="Enter Priority" required>
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
            <th>Division Name</th>
            <th>Division Priority</th>
            <th>Action</th>
          </tr>
          <thead>
          <tbody>
          <tr>
            @foreach($divisions as $division)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$division->name}}</td>
                <td>{{$division->priority}}</td>

                <td>
                  <!-- <a href="{{route('admin.division.edit', $division->id)}}" class="btn btn-success">Edit</a> -->

                  <a href="#editModal{{ $division->id }}" data-toggle="modal" class="btn btn-success">Edit</a>
                  <a href="#deleteModal{{$division->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.division.delete', $division->id)!!}" method="post">
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
                <div class="modal fade" id="editModal{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Division</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{!! route('admin.division.update', $division->id)!!}" method="post" enctype="multipart/form-data">
                          {{csrf_field() }}
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{$division->name}}">
                          </div>

                          <div class="form-group">
                            <label for="priority">Priority</label>
                            <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" value="{{$division->priority}}">
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
                <th>Division Name</th>
                <th>Division Priority</th>
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
