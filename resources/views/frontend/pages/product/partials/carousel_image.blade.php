

 @foreach ($carousels as $carousel)


      @php $i=1; @endphp
      @foreach ($carousel->images as $image)
       @if ($i>0)

       <div class="item"><img src="{{asset('images/carousels/'. $image->image)}}" alt="{{$carousel->title}}" style="height:200px;"></div>

       @endif
       @php $i--; @endphp
      @endforeach
        <div class="card-body">
          <h4 class="card-title text-center">

         </h4>

        </div>
        <div class="card-footer">
          <p> Footer ....</p>
        </div>


 @endforeach
