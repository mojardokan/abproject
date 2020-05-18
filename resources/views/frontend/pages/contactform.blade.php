@extends('frontend.layouts.master')

@section('content')
<div class="card bg-primary text-light">
  <div class="card-body">
    <!-- <h2 class="text-center"><i class="fa fa-envelope"></i></h2> -->
    <h3 class="text-center">If you have any query</h3>
    <p class="text-center">Please fill out this form and send</p>
    <form action="{!!route('frontend.pages.contactmail')!!}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="username" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
        <small class="from-text text-muted">Your email will not be shared with anyone</small>
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <input class="form-control" type="text" name="subject" placeholder="Enter your subject" required>
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control"  name="message" rows="6" cols="30" required></textarea>
      </div>
      <input type="submit" class="btn btn-outline-light float-right" name="" value="Send">
    </form>
  </div>
</div>
@endsection
