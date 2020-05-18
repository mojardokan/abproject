<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image"> <img src="{{ asset('images/faces/face1.jpg')}}" alt="image"/> <span class="online-status online"></span> </div>
        <div class="profile-name">
          <p class="name">Md. Aminur Rahman</p>
          <p class="designation">Manager</p>
          <div class="badge badge-teal mx-auto mt-3">Online</div>
        </div>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}"><img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt="" ><span class="menu-title">Dashboard</span></a></li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Products</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="general-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.products') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Products</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.product.create') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Add Product</span></a></li>
          </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#order-pageas" aria-expanded="false" aria-controls="order-pageas"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Orders</span> <i class="menu-arrow"></i> </a>
      <div class="collapse" id="order-pageas">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.orders')}}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Orders </span></a> </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#category-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Categoires</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="category-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Category</span></a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Add Category</span></a></li>
          </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#brand-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Brands</span><i class="menu-arrow"></i></a>
      <div class="collapse" id="brand-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brands') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Brands</span></a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand.create') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Add Brands</span></a></li>
          </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#division-pages" aria-expanded="false" aria-controls="auth"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">
        Divisions</span> <i class="menu-arrow"></i> </a>
      <div class="collapse" id="division-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.divisions')}}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Division </span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.division.create')}}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Add Division</span></a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#distric-pages" aria-expanded="false" aria-controls="auth"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""><span class="menu-title">
        Districts</span> <i class="menu-arrow"></i> </a>
      <div class="collapse" id="distric-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.districts')}}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage District </span></a> </li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin.district.create')}}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Add District</span></a></li>
        </ul>
      </div>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#slider-pages" aria-expanded="false" aria-controls="auth"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""><span class="menu-title">
          Sliders</span> <i class="menu-arrow"></i> </a>
        <div class="collapse" id="slider-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.sliders')}}"  <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt="">Manage Slider</span> </a> </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#carousel-pages" aria-expanded="false" aria-controls="auth"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""><span class="menu-title">
          Carousels</span> <i class="menu-arrow"></i> </a>
        <div class="collapse" id="carousel-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.carousels')}}"  <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt="">Manage Carousel</span> </a> </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#offer-pages" aria-expanded="false" aria-controls="offer-pages"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Offers</span><i class="menu-arrow"></i></a>
        <div class="collapse" id="offer-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.offers') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage offers</span></a></li>
            </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#addbanner1-pages" aria-expanded="false" aria-controls="addbanner1-pages"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Banner1</span><i class="menu-arrow"></i></a>
        <div class="collapse" id="addbanner1-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.addbanner1s') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Banner1</span></a></li>
            </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#banner-pages" aria-expanded="false" aria-controls="banner-pages"> <img class="menu-icon" src="{{ asset('images/menu_icons/10.png') }}" alt=""> <span class="menu-title">Banner</span><i class="menu-arrow"></i></a>
        <div class="collapse" id="banner-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.banners') }}" <i class="menu-icon mdi mdi-restart"></i> <img class="menu-icon" src="{{ asset('images/menu_icons/02.png') }}" alt=""><span class="menu-title">Manage Banner</span></a></li>
            </ul>
        </div>
      </li>

    </li>
    <li class="nav-item">
      <a class="nav-link"  href="">
        <form class="form-inline" action="{{ route('admin.logout')}}" method="post">
          @csrf
          <input type="submit" name="" value="Logout Now" class="btn btn-danger">
        </form>
      </a>
    </li>
  </ul>
</nav>
