@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card card-body">
        <h3>Welcome to your admin panel</h3>
        <br>
        <br>
          <p><a href ="{!!route('index')!!}" class="btn btn-primary btn-lg" target="_blank">Visit Main Site</a></p>
          <p><a href ="{!!route('index')!!}" class="btn btn-primary btn-lg">Add New</a></p>
          @include('backend.pages.allcarousel')
      </div>

    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="http://www.aminbazar.com/" target="_blank">AminBazar</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
@endsection
