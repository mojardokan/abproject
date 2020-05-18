@extends('frontend.layouts.master')

@section('content')

  <div class="container margin-top-20">
    <h2> Aminbazar abc </h2>
    <div class="widget">
      <div class="card bgstyle">
        <p class="pp">Promotional offers</p>
      </div>
    </div>
    <div class="widget">
    <div class="card-body">
        <div class="row">
          @foreach($offers as $offer)
          <div class="card-body">
            @if ($offer->priority==1)
            <a href="{!! route('allcategory')!!}">
              @elseif ($offer->priority==2)
              <a href="{!! route('bundle')!!}"> @endif

                <img src="{!!asset('images/offers/'.$offer->image)!!}" width="500">
            </a>

        </div>
          @endforeach
        </div>
      </div>
      </div>
      <div class="widget">
        dddddd
      </div>
</div>

@endsection
