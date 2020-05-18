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
              <span class="badge badge-warning"><h5>District Page</h5></span>
            </li>
            <li class="nav-item p-3">
              <a href ="{{route('admin.index')}}" class="btn btn-info mb-2">Home</a>
            </li>
            <li class="nav-item p-3">
              <a href ="{{route('admin.district.create')}}" class="btn btn-info mb-2">Add New District</a>
            </li>
          </ul>
        </div>
        <table class="table table-hover table-striped" id="dataTable">
          <thead>
          <tr>
            <th>#</th>
            <th>District Name</th>
            <th>Division Name</th>
            <th>Action</th>
          </tr>
          <thead>
          <tbody>
          <tr>
            @foreach($districts as $district)
              <tr>
                <td>#</td>
                <td>{{$district->name}}</td>
                <td>{{$district->division->name}}</td>

                <td>
                  <a href="{{route('admin.district.edit', $district->id)}}" class="btn btn-success">Edit</a>

                  <a href="#deleteModal{{$district->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{!! route('admin.district.delete', $district->id)!!}" method="post">
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
              <th>District Name</th>
              <th>Division Name</th>
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
