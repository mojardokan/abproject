@extends('frontend.layouts.master')

@section('content')

  <div class="container margin-top-20">
    <h2> Aminbazar abc </h2>
    <div class="widget">
      <div class="card bgstyle">
        <p class="pp">Test carousels</p>
      </div>
    </div>
    <div class="widget">
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic carousel</h4>
              <div class="carousel1 owl-carousel">

                  @foreach($carousels as $carousel)
                  <div class="card-body">
                    @if ($carousel->priority==1)
                    <a href="{!! route('carousel')!!}">
                      @elseif ($carousel->priority==2)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==3)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==4)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==5)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==6)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==7)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==8)
                      <a href="{!! route('contact')!!}">
                      @elseif ($carousel->priority==9)
                      <a href="{!! route('contact')!!}"> @endif

                        <img src="{!!asset('images/carousels/'.$carousel->image)!!}" alt="{{ $carousel->title }}" width="500">
                    </a>

                </div>
                  @endforeach

              </div>
          </div>
          </div>
      </div>
      <div class="widget">
          <section class = "slideshow">
              <div class ="content">
                <div class ="content-carrousel">
                    <a href="{!! route('carousel')!!}">
                      @foreach($carousels as $carousel)
                            <figure class ="shadow"><img src="{!!asset('images/carousels/'.$carousel->image)!!}" alt="{{ $carousel->title }}" width="500"></figure>
                      @endforeach
                    </a>

                </div>
              </div>
          </section>
      </div>
      <div class="widget">
        <div class="card bgstyle">
          <p class="pp">Aminbazar</p>
        </div>
      </div>
      <div class="widget">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Fashion House</h4>
                <div class="carousel1 owl-carousel">
                  @foreach($carousels as $carousel)
                  <div class="card-body">  <img src="{!!asset('images/carousels/'.$carousel->image)!!}" alt="{{ $carousel->title }}" width="500">
                  </div>
                  @endforeach

                </div>
            </div>
            </div>
        </div>
      <div class="widget">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title"> House</h4>
                <div class=" carousel2 owl-carousel">
                  @foreach($carousels as $carousel)
                  <div class="card-body">  <img src="{!!asset('images/carousels/'.$carousel->image)!!}" alt="{{ $carousel->title }}" width="500">
                  </div>
                  @endforeach

                </div>
            </div>
            </div>
        </div>
</div>

@endsection
