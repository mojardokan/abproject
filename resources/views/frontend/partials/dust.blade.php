<!-- Important category -->
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
<!-- Important category -->
@foreach (App\Models\Category::orderby('name','asc')->where('parent_id',$parent->id)->get() as $child)

<option class="option" id="Category{{$child->id}}" value="{{$parent->id}}">--{{$child->name}}</option>

@endforeach

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Really Delete it?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{!! route('admin.product.delete', $product->id)!!}" method="post">
          {{csrf_field() }}
          <button type="submit" class="btn btn-danger">Permanent Delete</button>
        </form>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- Backup Navbar  start-->
<a class="dropdown-item" href="#">Beauty & Health</a>
<a class="dropdown-item" href="#">Electronic Devices</a>
<a class="dropdown-item" href="#">Electronic Accessories</a>
<a class="dropdown-item" href="#">Fish</a>
<a class="dropdown-item" href="#">Fruits</a>
<a class="dropdown-item" href="#">Men Fashion</a>
<a class="dropdown-item" href="#">Women Fashion</a>
<a class="dropdown-item" href="#">Baby Fashion</a>
<a class="dropdown-item" href="#">Furiture</a>
<a class="dropdown-item" href="#">Groceries</a>
<a class="dropdown-item" href="#">Kitchen Appliances</a>
<a class="dropdown-item" href="#">Organic Products</a>
<a class="dropdown-item" href="{{ route('contact') }}">Sweets</a>
<a class="dropdown-item" href="#">Spice</a>
<a class="dropdown-item" href="#">Spice</a>
<a class="d<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
  <div class="container">


    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu pre-scrollable" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Beauty & Health</a>
            <a class="dropdown-item" href="#">Electronic Devices</a>
            <a class="dropdown-item" href="#">Electronic Accessories</a>
            <a class="dropdown-item" href="#">Fish</a>
            <a class="dropdown-item" href="#">Fruits</a>
            <a class="dropdown-item" href="#">Men Fashion</a>
            <a class="dropdown-item" href="#">Women Fashion</a>
            <a class="dropdown-item" href="#">Baby Fashion</a>
            <a class="dropdown-item" href="#">Furiture</a>
            <a class="dropdown-item" href="#">Groceries</a>
            <a class="dropdown-item" href="#">Kitchen Appliances</a>
            <a class="dropdown-item" href="#">Organic Products</a>
            <a class="dropdown-item" href="{{ route('contact') }}">Sweets</a>
            <a class="dropdown-item" href="#">Spice</a>
            <a class="dropdown-item" href="#">Spice</a>
            <a class="dropdown-item" href="#">Spice</a>
            <a class="dropdown-item" href="#">Spice</a>
            <a class="dropdown-item" href="#">Others</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Hot Offer</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Bundle Offer</a>
          </div>

        </li>
        <li class="nav-item {{ Route::is('index')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Route::is('products')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('products') }}">Products</a>
        </li>
        <li class="nav-item {{ Route::is('carousel')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('carousel') }}">Carousel Test</a>
        </li>

        <li class="nav-item {{ Route::is('contact')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0" action="{!! route('search') !!}" method="get">

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary search-icon-button" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>

          </form>
        </li>


      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">
            <button class="btn btn-danger">
              <span class="mt-1">Cart</span>
              <span class="badge badge-warning" id="totalItems">
                {{ App\Models\Cart::totalItems() }}
              </span>
            </button>
          </a>
        </li>
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="img rounded-circle" style="width:40px">
                      {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                          {{ __('My Dashboard') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </div>
  </div>
</nav>
<!-- End Backup Navbar  --!>


///////////////////

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
  <div class="container">


    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse navClass" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" >
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
                  <ul class="sub-menu">
                          <li>Toyota</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                          <li>Ford</li>
                      </ul>



        </li>
        <li class="nav-item {{ Route::is('index')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{ Route::is('products')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('products') }}">Products</a>
        </li>
        <li class="nav-item {{ Route::is('carousel')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('carousel') }}">Carousel Test</a>
        </li>

        <li class="nav-item {{ Route::is('contact')? 'active' : '' }}">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0" action="{!! route('search') !!}" method="get">

            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary search-icon-button" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>

          </form>
        </li>


      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">
            <button class="btn btn-danger">
              <span class="mt-1">Cart</span>
              <span class="badge badge-warning" id="totalItems">
                {{ App\Models\Cart::totalItems() }}
              </span>
            </button>
          </a>
        </li>
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="img rounded-circle" style="width:40px">
                      {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                          {{ __('My Dashboard') }}
                      </a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar Part -->

<!-- Navbar Category Start-->
<li class="nav-item dropdown">
  <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categories
  </a>
      <ul>
        <li>
          <ul class="dropdown pre-scrollable">
             @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)
             <li><a href="#main-{{$parent->id}}">{{$parent->name}}</a></li>
                <ul>
                   @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',$parent->id)->get() as $child)
                   <li><a href="{!!route('categories.show', $child->id)!!}">-- {{$child->name}}</a></li>
                   @endforeach
               </ul>
             @endforeach
             </li>
           </ul>
      </ul>
</li>
<!-- Navbar Category End-->
<div class="col-md-8">
  <div class="widget">
     <h3>All Products in <span class="badge badge-info">{{$category->name}} Category</span></h3>
      @php
        $products= $category->products()->paginate(8);
      @endphp

      @foreach (App\Models\Category::orderby('name','asc')->where('parent_id',NULL)->get() as $parent)

      $parent="#main-{{$parent->id}}"

      @if ($parent->count() > 0 )

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
