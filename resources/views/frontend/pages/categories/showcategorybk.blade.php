
@extends('frontend.layouts.master')

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container margin-top-20'>
    <div class="row">
      <div class="col-md-2">

        <div class="widget">
            <div class="nav-link link-nav">
              <ul>
                <li> <a href="#"><h3>Categories</h3></a>
                  <ul class="dropdown">

                     @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
                     <li>
                        <a href="{!!route('categories.showcategory', $parent->id)!!}">{{$parent->name}}</a>
                        <ul>
                       @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',$parent->id)->get() as $child)

                       <li><a href="{!!route('categories.show', $child->id)!!}">{{$child->name}}</a></li>

                       @endforeach
                       </ul>
                     @endforeach
                     </li>
                   </ul>
                </li>
              </ul>
            </div>
        </div>

      </div>

      <div class="col-md-10">
        <div class="widget">
           <h3>All Products in <span class="badge badge-info">{{$category->name}} Category</span></h3>
           @php
             $products= $category->products()->paginate(8);
           @endphp

           @if ($products->count() > 0 )
             @include('frontend.pages.product.partials.all_products')
            @else
            <div class="alert alert-warning">
              No Products has added yet in this category!!
            </div>
           @endif

        </div>
        <div class="widget">

        </div>
      </div>


    </div>
  </div>

  <!-- End Sidebar + Content -->
@endsection
