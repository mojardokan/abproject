<div class="row">

 @foreach ($products as $product)

  <div class="col-md-3 mt-2">
    <div class="card h-100">

      @php $i=1; @endphp
      @foreach ($product->images as $image)
       @if ($i>0)
       <a href="{!! route('products.show', $product->slug)!!}">
       <img class="card-img-top feture-img" src="{{asset('images/products/'. $image->image)}}" alt="{{$product->title}}">
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
        <div class="card-footer text-center">
          @include('frontend.pages.product.partials.cart-button')
        </div>
     </div>
  </div>
 @endforeach

</div>
<div class="mt-4 pagination">
{{$products->links()}}
</div>
