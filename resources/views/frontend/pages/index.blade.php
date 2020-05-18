@extends('frontend.layouts.master')

@section('content')
{{--@include('frontend.partials.ourJs')--}}
{{--Start Sidebar + Containt--}}

<div class="our-slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

      @foreach ($sliders as $slider)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active' : ''}}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
      @foreach ($sliders as $slider)
      <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}">
        <img class="d-block w-100" src="{{ asset('images/sliders/'.$slider->image)}}" alt="{{ $slider->title }}" style="height:300px;"/>
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $slider->title}}</h5>

          @if ($slider->button_text)
          <p>
            <a href="{{ $slider->button_text }}" target="_blank" class="btn btn-warning">{{ $slider->button_text }}</a>
          </p>
          @endif
        </div>
      </div>
      @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

  <div class="container margin-top-20">

    <div class="row">
      <div class="col-md-2">
        <div class="widget">
          @include('frontend.partials.categories-sidebar')
        </div>
        </div>

      <div class="col-md-10">
          <div class="widget">
             <h3> Featured Products </h3>
              @include('frontend.pages.product.partials.all_products')
          </div>
      </div>
    </div>

  <div class="widget">
        <div class="card">
            <div class="card-body">

          </div>
      </div>
  </div>
  <div class="widget">
      <h4 class="card-title h4ct text-center">AminBazar</h4>
      <div class="carousel1 owl-carousel text-align:center">
        @foreach (App\Models\Carousel::orderby('priority', 'asc')->get() as $carousel)
          <div class="card" style="text-align:center">
            <img class="rounded d-block w-100 mb-1" src="{{ asset('images/carousels/'.$carousel->image)}}" alt="{{ $carousel->title }}">
              @if ($carousel->button_text)
              <p>
                <a href="{{$carousel->button_link}}" target="_blank" class="btn btn-warning">{{ $carousel->button_text }}</a>
              </p>
              @endif
          </div>
        @endforeach
      </div>

  </div>
  <div class="widget">
      <h4 class="card-title h4ct text-center">AminBazar Bannar</h4>
        <div class="card mt-4">
            <div class="card-body">
              <div id="carouselExampleFade" class="carousel-fade" data-ride="carousel" data-interval="3000">
                  <div class="carousel-inner">
                    @foreach ($addbanner1s as $addbanner1)
                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : ''}}">
                      <img class="rounded d-block w-100" src="{{ asset('images/addbanner1s/'.$addbanner1->image)}}" alt="">
                    </div>
                    @endforeach
                  </div>
                </div>
          </div>
      </div>
  </div>
  <div class="widget">
    <div class="row">
        <div class="col-md-12 mt-2">
          <h4 class="card-title h4ct text-center">Bundle Offer</h4>
            <div class="carousel2 owl-carousel">
                  @foreach (App\Models\Offer::orderby('priority', 'asc')->get() as $offer)
                    <div class="card-body" style="text-align:center">
                      <img class="rounded mb-1" src="{{ asset('images/offers/'.$offer->image)}}" alt="{{ $offer->title }}" width="576" height="400">
                      <p>
                        <a href="{!!route('grocery')!!}" target="_blank" class="btn btn-warning">{{ $offer->title }}</a>
                      </p>
                    </div>
                  @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
{{--End Sidebar + Containt--}}

@endsection
