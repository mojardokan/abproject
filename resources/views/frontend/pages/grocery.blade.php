@extends('frontend.layouts.master')

@section('content')
  <div class="container margin-top-20">
    <div class="widget">
      <!DOCTYPE html>
        <html>
        	<head>
        		<title>3D image slideshow</title>
        	</head>
        	<body>
            <section class = "slideshow">
                <div class ="content">
                  <div class ="content-carrousel">
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_1.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_2.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_3.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_4.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_5.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_6.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_7.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_8.jpg')}}"></figure>
                    <figure class ="shadow"><img src ="{{asset('images/rslider/'. 'image_9.jpg')}}"></figure>
                  </div>
                </div>
              </section>
        	</body>
        </html>
    </div>
    <h2> Aminbazar </h2>
    <hr>
    <div class="row">

      <div class="col-md-12">
        <h5>Grocery Products</h5>


          <div class="row">
            Offer banner
          </div>
          @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $category)

               <div class="card mt-2">
              <div class="col-md-12 mt-2">

                  <div class="widget">
                  <h3>Products in<span class="badge badge-info">{{$category->name}} Category</span></h3>

                      @php
                        $products= $category->products()->paginate(4);
                      @endphp
                      @if ($products->count() > 0 )
                        @include('frontend.pages.product.partials.all_products')
                       @else
                       <div class="alert alert-warning">
                         No Products has added yet in this category!!
                       </div>
                      @endif

                  </div>

              </div>

            </div>
          @endforeach

      </div>
    </div>
    <div class="widget">

    </div>
    <div class="widget">

    </div>
  </div>
@endsection
