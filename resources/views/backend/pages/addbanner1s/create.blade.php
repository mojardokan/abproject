@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card-heard">
       Add Division
    </div>
    <div class="card">
      <div class="card-body">
        <form action="{{route('admin.division.store')}}" method="post" enctype='multipart/form-data'>
          @csrf
          @include('backend.partials.messages')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Division Name">
          </div>
          <div class="form-group">
            <label for="priority">Priority</label>
            <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" placeholder="Enter Priority">
          </div>        

          <button type="submit" class="btn btn-primary">Add Division</button>
        </form>
      </div>
    </div>

  </div>
</div>

@endsection
