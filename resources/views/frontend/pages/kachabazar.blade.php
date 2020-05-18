
@extends('frontend.layouts.master')

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-2">

        <div class="widget">
            @include('frontend.partials.categories-sidebar')
        </div>

      </div>

      <div class="col-md-10">
        <div class="widget">
          @foreach ($category as $cat)
            <h3><span class="badge badge-info">{{$cat->name}}</span></h3>
                @php
                  $products= $cat->products()->paginate(8);
                @endphp
                @if ($products->count() > 0 )
                  @include('frontend.pages.product.partials.all_products')
                 @else
                 <div class="alert alert-warning">
                   No Products has added yet in this category!!
                 </div>
                @endif
          @endforeach
        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection
