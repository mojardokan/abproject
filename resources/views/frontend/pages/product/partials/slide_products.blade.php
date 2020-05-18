

 @foreach ($products as $product)


    <div class="card h-100">

      @php $i=1; @endphp
      @foreach ($product->images as $image)
       @if ($i>0)
       <a href="{!! route('products.show', $product->slug)!!}">
       <div class="item"><img src="{{asset('images/products/'. $image->image)}}" alt="{{$product->title}}" style="height:200px;"></div>
      </a>
       @endif
       @php $i--; @endphp
      @endforeach
        <div class="card-body">
          <h4 class="card-title text-center">
              <a href="{!! route('products.show', $product->slug)!!}">{{$product->title}}</a>
         </h4>
          <p class="card-text text-center">Taka - {{$product->price}}</p>
        </div>
        <div class="card-footer">
          @include('frontend.pages.product.partials.cart-button')
        </div>

  </div>
 @endforeach
